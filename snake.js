    "use strict";

var indicator = document.querySelector('.nav-indicator');
var items = document.querySelectorAll('.nav-item');

function handleIndicator(el) {
  items.forEach(function (item) {
    item.classList.remove('is-active');
    item.removeAttribute('style');
  });
  indicator.style.width = "".concat(el.offsetWidth, "px");
  indicator.style.left = "".concat(el.offsetLeft, "px");
  indicator.style.backgroundColor = el.getAttribute('active-color');
  el.classList.add('is-active');
  el.style.color = el.getAttribute('active-color');
}

items.forEach(function (item, index) {
  item.addEventListener('click', function (e) {
    handleIndicator(e.target);
  });
  item.classList.contains('is-active') && handleIndicator(item);
});
     

var addNumeration = function(cl){
  var table = document.querySelector('table.' + cl)
  var trs = table.querySelectorAll('tr')
  var counter = 1
  
  Array.prototype.forEach.call(trs, function(x,i){
    var firstChild = x.children[0]
    if (firstChild.tagName === 'TD') {
      var cell = document.createElement('td')
      cell.textContent = counter ++
      x.insertBefore(cell,firstChild)
    } else {
      firstChild.setAttribute('colspan',2)
    }
  })
}

addNumeration("number")
