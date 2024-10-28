// window.onload(
//         const timerSecond = document.querySelector('#timerSecond')

// function timerDecrease = () => {
//     let updatedTimerSecond = timerSecond.innerHTML - 1
//     timerSecond.innerHTML = updatedTimerSecond
// }

// setInterval(timerDecrease , 1000)

// window.onload = function () {
//   const timerSecond = document.querySelector("#timerSecond");
//   const sendOtp = document.querySelector("#sendOtp");

//   function timerDecrease() {
//     let updatedTimerSecond = timerSecond.innerHTML - 1;
//     timerSecond.innerHTML = updatedTimerSecond;

//     if (timerSecond.innerHTML == 0) {
//       clearInterval(interval);
//       sendOtp.classList.remove("d-none");
//       sendOtp.classList.add("d-block");
//     }
//   }

//   const interval = setInterval(timerDecrease, 1000); // Change to 1000 ms for a 1-second interval
// };

const otpVerification = document.getElementById("otpVerification");
const userOtp = document.getElementById("userOtp");

// popup elements
const popUpMsg = document.getElementById("popUpMsg");
const popUpMsgTxt = document.getElementById("popUpMsgTxt");
const closePopUpButton = document.getElementById("closePopUp");

otpVerification.addEventListener("submit", (e) => {
  if (userOtp.value.trim().length === 0) {
    e.preventDefault();
    popUpMsgTxt.innerText = "Fill The 6 Digit OTP sent to your Email";
    popUpMsg.classList.add("show", "animate__animated", "animate__backInRight");
  }
  else if (userOtp.value.trim().length != 6) {
    e.preventDefault();
    popUpMsgTxt.innerText = "OTP length Does not match";
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
