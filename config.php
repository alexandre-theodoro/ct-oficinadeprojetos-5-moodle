<?php  // Moodle configuration file

$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'auroramysql';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'db-moodle-aurora.cluster-cdwk017yeslt.us-east-1.rds.amazonaws.com';
$CFG->dbname    = 'db_moodle';
$CFG->dbuser    = 'admin';
$CFG->dbpass    = 'moodle1234';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => 3306,
  'dbsocket' => '',
  'dbcollation' => 'utf8mb4_general_ci',
);

$CFG->wwwroot   = 'http://3.90.136.173/moodle';
$CFG->dataroot  = '/var/moodledata';
$CFG->admin     = 'admin';


#$CFG->dataroot = '/mnt/efs/fs1/var/moodledata';        #Armazenado no sistema de arquivos EFS compartilhado
#$CFG->dirroot = '/var/www/html/moodle';                #Armazenado no volume raiz do EBS
#$CFG->localcachedir = '/var/moodledata/localcache';    #Armazenado no volume raiz do EBS

#$CFG->cachedir = '/mnt/efs/fs1/var/moodledata/cache';  #Armazenado no sistema de arquivos EFS compartilhado
#$CFG->tempdir = '/mnt/efs/fs1/var/moodledata/temp';    #Armazenado no sistema de arquivos EFS compartilhado


$CFG->directorypermissions = 0777;

$CFG->session_handler_class = '\core\session\memcached';
$CFG->session_memcached_save_path = 'memcache-moodle.nqhw5t.cfg.use1.cache.amazonaws.com:11211';
#$CFG->session_memcached_save_path = '127.0.0.1:11211';
$CFG->session_memcached_prefix = 'memc.sess.key.' . $hostname; #concatenei o hostname no prefixo para diferenciar o servidor
$CFG->session_memcached_acquire_lock_timeout = 120;
$CFG->session_memcached_lock_expire = 7200;  # Ignored if memcached extension <= 2.1.0


require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
