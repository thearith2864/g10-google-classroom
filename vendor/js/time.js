function showDate() {
  let datess = document.querySelectorAll('#dateline');
  // console.log(datess);
    let today = new Date();
    let minute = today.getMinutes();
    let Second = today.getSeconds()
    let hour = today.getHours();
    let date = today.getDate();
    let month = today.getMonth();
    let year = today.getFullYear();
    let target = `${year}-${month+1}-${date}`

    if (hour > 12){
      hour = hour - 12
    }
    hourElement.value = `${year}-${month+1}-${date}-${hour}-${minute}-${Second}`
  
  }
  const hourElement = document.querySelector("#hour");
   
  setInterval(showDate, 1000);

  function copyText() {
    var text = document.getElementById("text-to-copy");
    text.select();
    text.setSelectionRange(0, 99999);
    document.execCommand("copy");
}

