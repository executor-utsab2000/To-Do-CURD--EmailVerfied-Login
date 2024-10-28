const inputExpenseDetailsForm = document.querySelector("#inputExpenseDetailsForm");


// popup elements
const popUpMsg = document.getElementById("popUpMsg");
const popUpMsgIcon = document.getElementById("popUpMsgIcon");
const popUpMsgTxt = document.getElementById("popUpMsgTxt");
const closePopUpButton = document.getElementById("closePopUp");

const inputExpenseDetails = inputExpenseDetailsForm.querySelectorAll(
  ".inputExpenseDetails"
);
console.log(inputExpenseDetails);
console.log(inputExpenseDetails[0].getAttribute("placeholder"));

inputExpenseDetailsForm.addEventListener("submit", (e) => {
  for (let i = 0; i < inputExpenseDetails.length; i++) {
    if (inputExpenseDetails[i].value.trim().length == 0) {
      e.preventDefault();
      const getMessageTxt = inputExpenseDetails[i].getAttribute("placeholder");
      popUpMsgTxt.innerText = getMessageTxt;
      popUpMsg.classList.add(
        "show",
        "animate__animated",
        "animate__backInRight"
      );
      break; // breaking the loop if confition unsatisfies
    }
  }
});

closePopUpButton.addEventListener("click", () => {
  popUpMsg.classList.remove(
    "show",
    "animate__animated",
    "animate__backInRight"
  );
});
