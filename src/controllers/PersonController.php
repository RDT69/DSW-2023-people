<?php 
namespace Jose\People\Controllers;

use Illuminate\Support\Facades\Request;
use Jose\People\Models\Person;

class PersonController {
  
  public function list() {
    $persons = Person::all();
    require('../src/views/person/list.php');
  }

  public function show($id) {
    $person = Person::find($id);
    if ($person){
      require('../src/views/person/show.php');
    } else {
      $this->list();
    }
   
  }
  
  public function delete($id) {
    $person = Person::find($id);
    //para comprobar que no existe la persona.
    if ($person){
      $person->delete();
    }
    $this->list();
  }

  public function create() {
    require('../src/views/person/create.php');
  }

  public function post($data) {
    $person = new Person();
    $person->name = $data['name'];
    $person->save();
    $this->list();
  }

  public function edit($id) {
    $person = Person::find($id);
    require('../src/views/person/edit.php');
  }

  public function update($id, $data) {
     $person = Person::find($id);
     $person->name = $data['name'];
     $person->save();
     $this->list();
  }
}