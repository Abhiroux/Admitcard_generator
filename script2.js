function generateAdmit() {
  document.getElementById("instituteName").innerHTML =
    document.getElementById("examBoard").value;
  document.getElementById("candidateName").innerHTML =
    document.getElementById("name").value;
  document.getElementById("fatherName").innerHTML =
    document.getElementById("FName").value;
  document.getElementById("birthDay").innerHTML =
    document.getElementById("DOB").value;
  document.getElementById("CandidateAddress").innerHTML =
    document.getElementById("address").value;
  let dateOfexam = document.getElementById("dateOFexam").value;
  let dayOFexam = document.getElementById("dayOFexam").value;
  document.getElementById("dateDay").innerHTML = dateOfexam + ", " + dayOFexam;
  document.getElementById("timings").innerHTML =
    document.getElementById("timeOFexam").value;
  document.getElementById("subjects").innerHTML =
    document.getElementById("subjectOFexam").value;
  document.getElementById("centerName").innerHTML =
    document.getElementById("addressOFexam").value;
  document.getElementById("examName").innerHTML =
    document.getElementById("nameOFexamination").value;
  document.getElementById("rollNumber").innerHTML =
    document.getElementById("rollno").value;

  document.getElementById("admitCard-form").style.display = "none";
  document.getElementById("admitCard-template").style.display = "block";

  let file = document.getElementById("image").files[0];
  let reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onloadend = function () {
    document.getElementById("imgT").src = reader.result;
  };
}

function printAdmit() {
  window.print();
}

var qrcode = new QRCode("test", {
  text: "http://jindo.dev.naver.com/collie",
  width: 128,
  height: 128,
  colorDark: "#000000",
  colorLight: "#ffffff",
  correctLevel: QRCode.CorrectLevel.H,
});
