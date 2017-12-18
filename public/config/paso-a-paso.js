$(function()
{
    var intro = introJs("#menu");
    
        intro.addStep({
          element: '#menu',
          intro: "dropdown"
        });
        intro.addStep({
            element: '#busqueda',
            intro: "This is an option within a dropdown.",
            position: 'bottom'
        });
        intro.setOption("skipLabel","Salir");
        intro.setOption("nextLabel","Siguiente");
        intro.setOption("prevLabel","Anterior");
        intro.setOption("doneLabel","¡ Listo !");
        intro.start();
});
/*
function startIntro(){
    var intro = introJs('#menu');
      intro.setOptions({
        steps: [
          {
            element: "#menu",
            intro: "This is a dropdown"
          },
          {
            element: '#busqueda',
            intro: "This is an option within a dropdown."
          },

        ]
      });

      intro.onbeforechange(function(element) {
        if (this._currentStep === 1) {
          setTimeout(function() {
            $("#menu").addClass("open");
          });
        }
      });
      intro.start();
  };

  $(document).ready(function() {
    setTimeout(startIntro,1500);
  });