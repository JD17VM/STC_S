

function mostrarFormAgregar() {
    var div_1 = document.getElementById('sup_agregar');
    var div_2 = document.getElementById('fondo_opaco');
    div_1.style.display = 'block';
    div_2.style.display = 'block';
  }
  
  function ocultarFormAgregar() {
    var div_1 = document.getElementById('sup_agregar');
    var div_2 = document.getElementById('fondo_opaco');
    div_1.style.display = 'none';
    div_2.style.display = 'none';
    
  }


  function mostrarFormModificar() {
    var div_1 = document.getElementById('sup_modificar');
    var div_2 = document.getElementById('fondo_opaco');
    div_1.style.display = 'block';
    div_2.style.display = 'block';
  }
  
  function ocultarFormModificar() {
    var div_1 = document.getElementById('sup_modificar');
    var div_2 = document.getElementById('fondo_opaco');
    div_1.style.display = 'none';
    div_2.style.display = 'none';
  }


  function mostrarFormEliminar() {
    var div_1 = document.getElementById('sup_eliminar');
    var div_2 = document.getElementById('fondo_opaco');
    div_1.style.display = 'block';
    div_2.style.display = 'block';
  }
  
  function ocultarFormEliminar() {
    var div_1 = document.getElementById('sup_eliminar');
    var div_2 = document.getElementById('fondo_opaco');
    div_1.style.display = 'none';
    div_2.style.display = 'none';
    return false;
  }

  function mostrarReclamo() {
    var div_1 = document.getElementById('sup_reclamo');
    var div_2 = document.getElementById('fondo_opaco');
    div_1.style.display = 'block';
    div_2.style.display = 'block';
  }

  function ocultarReclamo() {
    var div_1 = document.getElementById('sup_reclamo');
    var div_2 = document.getElementById('fondo_opaco');
    div_1.style.display = 'none';
    div_2.style.display = 'none';
  }