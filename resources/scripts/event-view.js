'use strict';


const list = document.querySelector(".list-view");
const box = document.querySelector(".box-view");
const eventBox = document.querySelector(".event");
const eventList = document.querySelector(".event-list");

if (typeof list != "undefined" && list != null) {
  list.addEventListener('click', (e) => {
    eventList.style.display = 'block';
    eventBox.style.display = 'none';
    list.style.display = 'none';
    box.style.display = 'block';
  })
}

if (typeof box != "undefined" && box != null) {
  box.addEventListener('click', (e) => {
    eventBox.style.display = 'block';
    eventList.style.display = 'none';
    list.style.display = 'block';
    box.style.display = 'none';
  })
}
