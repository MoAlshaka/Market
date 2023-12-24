let inputs = document.querySelectorAll("input[required]");
let messageDone = document.querySelector(".messageDone");
let BuyDone = document.querySelector("#BuyDone");
let all = [];
BuyDone.addEventListener("click", () => {
  inputs.forEach((e) => {
    if (e.value.length == 0) {
      messageDone.innerHTML = "يرجى اكمال جميع الحقول";
    } else {
      all.push(true);
    }
  });
  if (all.length == 5) {
    messageDone.innerHTML = "تم ارسال طلب الشراء";
    alert("تم ارسال طلب الشراء");
  }
  messageDone.classList.add("active");
  setTimeout(() => {
    messageDone.classList.remove("active");
  }, 2500);
});
let bars = document.querySelector(".fa-bars");
bars.addEventListener("click", () => {
  document.querySelector("header nav ul").classList.toggle("active");
});
