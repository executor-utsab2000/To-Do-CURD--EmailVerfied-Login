// popup elements
const popUpMsg = document.getElementById("popUpMsg");
const popUpMsgIcon = document.getElementById("popUpMsgIcon");
const popUpMsgTxt = document.getElementById("popUpMsgTxt");
const closePopUpButton = document.getElementById("closePopUp");

// form login/signup
const signUpFormHandler = document.getElementById("signUpFormHandler");
const loginForm = document.getElementById("loginForm");

// console.log(popUpMsg);
// console.log(signUpFormHandler);
// console.log(closePopUpButton);
// console.log(loginForm);

// login Form submit
loginForm.addEventListener("submit", (e) => {
  const loginInputs = document.querySelectorAll(".loginInputs");
  console.log(loginInputs);
  for (let i = 0; i < loginInputs.length; i++) {
    if (loginInputs[i].value.trim().length === 0) {
      e.preventDefault();
      // console.log(loginInputs[i].previousElementSibling.innerText.split(":")[0]);
      const alertMsg =
        loginInputs[i].previousElementSibling.innerText.split(":")[0];
      popUpMsgTxt.innerText = alertMsg;
      popUpMsg.classList.add(
        "show",
        "animate__animated",
        "animate__backInRight"
      );
      break;
    }
  }
});

// signup Form submit
signUpFormHandler.addEventListener("submit", (e) => {
  const signUpInputs = document.querySelectorAll(".signUpInputs");
  console.log(signUpInputs);
  for (let i = 0; i < signUpInputs.length; i++) {
    if (signUpInputs[i].value.trim().length === 0) {
      e.preventDefault();
      // console.log(signUpInputs[i].previousElementSibling.innerText.split(":")[0]);
      const alertMsg =
        signUpInputs[i].previousElementSibling.innerText.split(":")[0];
      popUpMsgTxt.innerText = alertMsg;
      popUpMsg.classList.add(
        "show",
        "animate__animated",
        "animate__backInRight"
      );
      break;
    } else if (signUpInputs[2].value != signUpInputs[3].value) {
      e.preventDefault();
      popUpMsgTxt.innerText = "Password does not Match";
      popUpMsg.classList.add(
        "show",
        "animate__animated",
        "animate__backInRight"
      );
    } else if (signUpInputs[2].value.trim().length < 5) {
      e.preventDefault();
      popUpMsgTxt.innerText = "Password must be minimum 5 letters";
      popUpMsg.classList.add(
        "show",
        "animate__animated",
        "animate__backInRight"
      );
    }
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
