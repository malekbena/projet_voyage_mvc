if (document.querySelector('.climatContainer')) {
  // var climat = document.querySelector('#climat')
  // var lon = climat.getAttribute('data-lon')
  // var lat = climat.getAttribute('data-lat')

  // var temp = climat.getAttribute('data-temp')
  // var name = climat.getAttribute('data-name')

  var lat = 22
  var lon = 22


  let map = new L.Map('map', {
    center: new L.LatLng(lat, lon), 
    zoom: 4
  })

  let baselayer = new L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
      maxZoom: 18,
  })

  map.addLayer(baselayer)

  var marker = L.marker([lat, lon])
  marker.addTo(map)
  marker.bindPopup('À ' + name.toUpperCase() + ' la température actuelle est de ' + temp + '°C')
  
  marker.on('mouseover', function (e) {
    this.openPopup()
  });
  marker.on('mouseout', function (e) {
      this.closePopup()
  }); 
}