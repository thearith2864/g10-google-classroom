function showDate() {
    let today = new Date();
    let minute = today.getMinutes();
    let Second = today.getSeconds()
    let hour = today.getHours();
    let date = today.getDate();
    let month = today.getMonth();
    let year = today.getFullYear();
    if (hour > 12){
      hour = hour - 12
    }
    hourElement.value = `${year}-${month+1}-${date}-${hour}-${minute}-${Second}`
  
  }
  const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];
  
  const hourElement = document.querySelector("#hour");
   
  setInterval(showDate, 1000);