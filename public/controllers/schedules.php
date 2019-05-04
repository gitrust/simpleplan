<?php

class Schedules extends Controller {
  private $pager;

  public function __construct() {
    parent::__construct($needsLogin=true);
    $this->initPager();
  }

  private function initPager() {
    // only positive numbers
    $page = abs(intval($this->getParamGet('page',0)));

    // Paginator
    $itemCount = $this->_model->eventCount();
    // default number of items per page = 3
    $pageCount = Session::get('paging.pagecount') ? Session::get('paging.pagecount') : 3; 
    $this->pager = new Paginator("schedules", $page, $itemCount, $pageCount);
  }

  public function index() {
    $this->render();
  }

  public function pdf() {
    $data['events'] = $this->_model->eventsLimited(0,4);
    $data['activities'] = $this->_model->activities();
    $data['tabledata'] = $this->createtable($data);  

    $this->_view->render('schedules/tpdf', $data);
  }

  public function tpdf() {
    $data['events'] = $this->_model->eventsLimited(0,4);
    $data['activities'] = $this->_model->activities();
    $data['tabledata'] = $this->createtable($data);  

    $this->_view->render('schedules/tpdf', $data);
  }

  // FIXME only admin should do that
  public function add() {
    if ($this->isPost()){
        $activity = $this->getParamPost('activity');
        $event = $this->getParamPost('event');
        $resource = $this->getParamPost('resource');
        if (!empty($activity) && !empty($event) && !empty($resource)) {      
          $this->_model->add($event,$activity,$resource);
        }
      }
    $this->render();
  }

  public function del($assignmentid) {
    if (!empty($assignmentid)) {
      $this->_model->delete($assignmentid);
    }
    $this->render();
  }

  private function createtable($data) {
      $table[] = array();

      $assignments = $this->_model->assignments();

      $row = 0;      
      foreach ($data['activities'] as $activity) {
         $col = 0;
         foreach ($data['events'] as $event) {

            // FIXME improve performance
            // search for existing assignments
            $assignment = array();
            foreach ($assignments as $a) {
                $key = $event["id"] . '-' . $activity["id"];
                // eventid-activityid
                if ($a["combkey"] == $key) {
                  $assignment = array("resourcename" => $a["resourcename"],"id" => $a["id"]);
                  break;
                }
            }

            // generate assignment table
            $table[$row][$col] = array("eventid" => $event["id"], 
              "activityid" => $activity["id"],
              "activityname" => $activity["name"] ,
              "categoryname" => $activity["categoryname"],
              "assignmentid" => $assignment["id"], 
              "resourceexists" => count($assignment) > 0,
              "resourcename" => $assignment["resourcename"]);
            $col++;
         }
         $row++;
      }

      return $table;
  }

  
  private function render() {
    $data['isadmin'] = $this->isAdmin();
    $data['ismanager'] = $this->isManager();
    
    $data['title'] = I18n::tr('title.entrylist');
    
    $data["readonly"] = !($this->isAdmin() || $this->isManager());
    $data["pager.prev"] = $this->pager->getPrev();
    $data["pager.next"] = $this->pager->getNext();
    $data["pager.page"] = $this->pager->getPage();
    $data["pager.show"] = $this->pager->getPageCount() > 1;
    $data['events'] = $this->_model->eventsLimited($this->pager->getOffset(),$this->pager->getItemsPerPage());
    $data['activities'] = $this->_model->activities();
    $data['resources'] = $this->_model->resources();
    $data['tabledata'] = $this->createtable($data);  

    // Render
    $this->_view->render('header', $data);
    $this->_view->render('container_start', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('schedules/modal', $data);
    $this->_view->render('schedules/list', $data);
    $this->_view->render('schedules/scripts', $data);
    $this->_view->render('container_end', $data);
    $this->_view->render('footer');
  } 

}
