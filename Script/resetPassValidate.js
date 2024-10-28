// popup Items
const popUpMsg = document.getElementById("popUpMsg");
const popUpMsgIcon = document.getElementById("popUpMsgIcon");
const popUpMsgTxt = document.getElementById("popUpMsgTxt");
const closePopUpButton = document.getElementById("closePopUp");

// input fields
const password = document.getElementById("password");
const cPassword = document.getElementById("cPassword");
console.log(password.value , cPassword.value);
// form

const resetPassform = document.getElementById("paswordReset");

resetPassform.addEventListener("submit", (e) => {
  if (password.value.trim().length < 5) {
    e.preventDefault();
    popUpMsgTxt.innerText = "Password must be minimum 5 letters";
    popUpMsg.classList.add("show", "animate__animated", "animate__backInRight");
  } else if (password.value != cPassword.value) {
    e.preventDefault();
    popUpMsgTxt.innerText = "Password does not Match";
    popUpMsg.classList.add("show", "animate__animated", "animate__backInRight");
  }
});

// close popup button
closePopUpButton.addEventListener("click", () => {
  popUpMsg.classList.remove(               
    "show",
    "animate__animated",
    "animate__backInRight"
  );
});
