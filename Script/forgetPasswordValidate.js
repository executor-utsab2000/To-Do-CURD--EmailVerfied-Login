const forgetFormEmailTake = document.getElementById("forgetFormEmailTake");
const email = document.getElementById("email");

// popup elements
const popUpMsg = document.getElementById("popUpMsg");
const popUpMsgTxt = document.getElementById("popUpMsgTxt");
const closePopUpButton = document.getElementById("closePopUp");

forgetFormEmailTake.addEventListener("submit", (e) => {
  if (email.value.trim().length === 0) {
    e.preventDefault();
    popUpMsgTxt.innerText = "Enter your Email";
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
