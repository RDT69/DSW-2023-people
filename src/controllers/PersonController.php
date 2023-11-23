<?php

namespace Jose\People\Controllers;

use Illuminate\Support\Facades\Request;
use Jose\People\Models\Person;

class PersonController {
  private $messages = [];

  public function list() {
    $persons = Person::all();
    require('../src/views/templates/head.php');
    require('../src/views/person/list.php');
    require('../src/views/templates/foot.php');
  }

  public function show($id)
  {
    $person = Person::find($id);
    if ($person) {
      require('../src/views/templates/head.php');
      require('../src/views/person/show.php');
      require('../src/views/templates/foot.php');
    } else {
      $messages [] = [
        'type' => 'error',
        'text' => "No se encuentra la persona con el id = $id"
      ];
      $this->list();
    }
  }

  public function delete($id)
  {
    $person = Person::find($id);
    //para comprobar que no existe la persona.
    if ($person) {
      $person->delete();
    }
    $this->list();
  }

  public function create()
  {
    require('../src/views/templates/head.php');
    require('../src/views/person/create.php');
    require('../src/views/templates/foot.php');
  }

  public function post($data)
  {
    $person = new Person();
    $person->name = $data['name'];
    $person->save();
    $this->list();
  }

  public function edit($id)
  {
    $person = Person::find($id);
    require('../src/views/templates/head.php');
    require('../src/views/person/edit.php');
    require('../src/views/templates/foot.php');
  }

  public function update($id, $data)
  {
    $person = Person::find($id);
    $person->name = $data['name'];
    $person->save();
    $this->list();
  }
}
