// tooltip

// $(document).ready(function () {
//   $('[data-toggle="tooltip"]').tooltip();
// });

let btnUpdate = document.querySelectorAll(".btnUpdate");
// console.log(btnUpdate);

btnUpdate.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    if (btn.innerHTML == "Update") {
      e.preventDefault(); //preventing default action of btn
      btn.innerHTML = "Save Changes";
      // console.log(e);
      // console.log(btn.parentNode.parentNode);
      let parentFormRow = btn.parentNode.parentNode; // form gets selected
      // console.log(parentFormRow);
      let childrenRow = parentFormRow.children; //returns html collection  kind of array
      let expenseItem = childrenRow[2].querySelector("#expenseItem").value; //so using array indexes to fetch value
      let expenseAmount = childrenRow[3].querySelector("#expenseAmount").value;
      console.log(expenseItem, expenseAmount);
      let Inputs = parentFormRow.querySelectorAll(".editInput");
      console.log(Inputs);

      Inputs.forEach((inp) => {
        inp.style.background = "white";
        inp.removeAttribute("readonly"); // removing
      });
    } else if (btn.innerHTML == "Save Changes") {
      btn.addEventListener("submit", () => {
        btn.innerHTML == "Update";
      });
    }
  });
});

const deleteConfirmModal = (id, topic) => {
  // console.log(topic);
  // console.log(id);
  document.getElementById("input").value = id;
  document.getElementById("deleteTopic").innerHTML = topic;
};
