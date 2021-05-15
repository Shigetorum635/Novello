const { schema } = require( './construct.js' );
async function Initialize(){
    await schema
    .createTable('accounts', (table)=>{
        table.increments('id');
        table.string('username');
        table.string('password');
        table.string('email');
        table.string('avatar');
        table.string('feed');
        table.string('body');
        // Unix time based rewards
        // This is probably the best kind of reward system if not the greatest.
        // Why do many other websites kill themselves parsing time dates tf what.
        table.integer('lastReward');  // 39123019239º12031203 moment!!

    })
    .createTable('userData', (table) => {
        table.integer('id'); // User data
        table.string('userAgent'); 
        table.string('ips'); // JSON BRRR
        table.string('latestLogin') // JSON data of latest logins.
    })
    // I wonder why nobody makes a table for each item type, 
    // it's really syntax sugar when writing SQL.
    // SELECT * FROM 'shirts' WHERE price<=10 
    // SELECT * FROM 'pants' WHERE xxx=aa;
    // SELECT * FROM collectibles? nah SELECT * FROM hats WHERE collectible=1;
    // Or for pending stuff
    // SELECT * FROM pending
    
    //cyclomatic was here
    .createTable('token', (table) => {
        table.increments('id'); //
        table.integer('userid'); // User id
        table.string('token'); // Generate token
    })
    
    .createTable('pending', (pending)=>{
        pending.increments('id');
        pending.string('name');
        pending.string('description');
        pending.integer('creator');
        pending.integer('type');
        pending.string('file'); // Raw files easier to analyze
    })
    // Pending ->whatever type -> render files
    .createTable('shirts', (assets) => {
        assets.increments('id');
        assets.integer('creator');
        assets.string('name');
        assets.string('description');
        assets.integer('price');
        assets.string('render');
    })
    .createTable('pants', (assets) => {
        assets.increments('id');
        assets.string('name');
        assets.string('description');
        assets.integer('price');
        assets.string('render');
        assets.integer('creator');

    })
    .createTable('hats', (assets) => {
        assets.increments('id');
        assets.string('name');
        assets.string('description');
        assets.integer('price');
        assets.string('render');
        assets.integer('isCollectible');
        assets.integer('stock');
        
    })
}
Initialize().then(()=>console.log("Finished.")).finally(process.exit(0));
