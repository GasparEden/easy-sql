# Easy-SQL
A lightweight PHP file which makes really easier your SQL connections and queries

## Usage example 

### First, create a new database connection
  `$db = new Connection('127.0.0.1', 'basename', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);`
  (Notice that if you're using default xampp/wampp/mamp configuration, you can give just a database name, other parameters have default values)

### Then, send your queries
  `$db->query('SELECT * FROM tablename WHERE id = :id', ["id" => 1]);` Here's a prepared statement
  ##### Or
  `$db->unsafe_query('SELECT * FROM tablename WHERE id = 1');` Here's a unprepared statement (not safe if there's parameters)
  <br/>
  (you don't have to `fetch`, `$db->query` and `$db->unsafe_query` return the fetched rows)
  
### Finally, close your database connection : 
  `$db->close();`
