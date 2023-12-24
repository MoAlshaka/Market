let bars = document.querySelector(".fa-bars");
bars.addEventListener("click", () => {
  document.querySelector("header nav ul").classList.toggle("active");
});

let nameError = document.getElementById("name-error");
let emailError = document.getElementById("email-error");
let subjectError = document.getElementById("subject-error");
let SubmitError = document.getElementById("Submit-error");

function UserNameChecker() {
  let InputName = document.getElementById("UserName").value;
  if (InputName.length == 0) {
    nameError.innerHTML = `Name is Required`;
    return false;
  } else {
    nameError.innerHTML = `<i class="fa-solid fa-circle-check"></i>`;
    return true;
  }
}
function EmailChecker() {
  let InputEmail = document.getElementById("email").value;
  if (InputEmail.length == 0) {
    emailError.innerHTML = `Email is Required`;
    return false;
  } else if (
    !InputEmail.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)
  ) {
    emailError.innerHTML = `Email Invalid`;
    return false;
  }
  emailError.innerHTML = `<i class="fa-solid fa-circle-check"></i>`;
  return true;
}
function textareaChecker() {
  let InputSubject = document.getElementById("Subject").value;
  let Required = 30;
  let mess = Required - InputSubject.length;
  if (mess > 0) {
    subjectError.innerHTML = mess + " More Character Required";
    return false;
  }
  subjectError.innerHTML = `<i class="fa-solid fa-circle-check"></i>`;
  return true;
}
function ValidForm() {
  if (!textareaChecker() || !EmailChecker() || !UserNameChecker()) {
    SubmitError.style.display = "block";
    SubmitError.innerHTML = "Please Fix The Error";
    setTimeout(() => {
      SubmitError.style.display = "none";
    }, 3000);
    return false;
  }
}
