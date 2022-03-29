window.onload = () =>{
  let elementCalendrier = document.getElementById("calendrier")

  // on instancie le calendrier
  let calendrier = new FullCalendar.Calendar(elementCalendrier,{
    //on appelle les composants
    plugins: ['timegrid']
  })

  calendrier.render()
}