import { file } from "./script2";
file = document.getElementById("image").files[0];
let reader = new FileReader();
reader.readAsDataURL(file);
reader.onloadend = function () {
  document.getElementById("imgT").src = reader.result;
};

function printAdmit() {
  window.print();
}
