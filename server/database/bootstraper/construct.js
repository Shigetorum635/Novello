let arguments = process.argv.slice(2);
const orm = arguments[0];
const host = arguments[1];
const user = arguments[2];
const password = arguments[3];
const database = arguments[4];
const knex = require('knex');

switch (orm) {
    case "sqlite": knex({
            client: 'sqlite3',
            connection: {
                filename: '../database.sqlite'
            }
        })
        break;

    case "mysql": knex({
            client: 'mysql',
            connection: {
                host: host,
                user: user,
                password: password,
                database: database
            },
            pool: {
                min: 0,
                max: 7
            }
        })

        knex.schema.createTable('user', (table) => {
            table.increments('id')
            table.string('username')
            table.string('password')
            table.string('email')
            table.string('avatar')
            table.integer('currency')
        }).then(() => console.log("finished keke"))
        break;
}
