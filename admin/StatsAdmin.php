<?PHP

require_once('api/Admin.php');


############################################
# Class goodCategories displays a list of products categories
############################################
class StatsAdmin extends Admin
{
 
  public function fetch()
  {
 	return $this->design->fetch('stats.tpl');
  }
}
