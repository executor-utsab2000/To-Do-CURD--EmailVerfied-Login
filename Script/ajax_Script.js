document.getElementById("searchFormInput").addEventListener("input", (e) => {
  const inputVal = document.getElementById("searchFormInput").value;

  $(document).ready(function () {
    $.post(
      " ./Backend/Ajax/searchDataFetch(ajax).php", //url
      { value: inputVal }, //body
      function (data, status) {
        console.log(data);
        document.getElementById("content").innerHTML = data;
      }
    );

    $.post(
      "./Backend/Ajax/calculateSum.php",
      { inputValue: inputVal },
      function (data, status) {
        console.log(data);

        document.querySelector("#expenseDisplay").innerText = data;
      }
    );
  });
});
