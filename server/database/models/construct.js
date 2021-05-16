let { knex, QueryBuilder, Knex } = require("knex");
knex.QueryBuilder.extend("wasMutated", function () {

    this.client.config.userParams.lastMutationTime = Date.now();
    return this;

});
const db = knex({
    client: "sqlite",
    connection: {
        host: "sqlite",
        user: "",
        password: "",
        database: "",
        filename: `../database.db`,
    },
    pool: { min: 0, max: 7 }, // POOLS!!

    postProcessResponse: (result) => {

        const booleanFields = [
            "enabled",
            "is_banned",
            "isPremium",
            "isAdmin",
            "limited",
            "isVerified",
        ];
        const processResponse = (row) => {

            Object.keys(row).forEach((key) => {

                if (booleanFields.includes(key)) {

                    if (row[key] === 0) row[key] = false;
                    else if (row[key] === 1) row[key] = true;

                }

            });
            return row;

        };

        if (Array.isArray(result)) return result.map((row) => processResponse(row));
        if (typeof result === "object") return processResponse(result);
        return result;

    },

    useNullAsDefault: true,
    log: {
        warn: (msg) => {

            if (typeof msg === "string" && msg.startsWith(".returning()")) return;
            console.warn(msg);

        },
    },
    userParams: {
        lastMutationTime: null,
    },
});

module.exports = db;