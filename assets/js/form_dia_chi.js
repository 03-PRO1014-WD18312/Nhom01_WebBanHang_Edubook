const forms = document.getElementById("form_dia_chi");
const show = document.getElementById("show_dia_chi");
const huyButton = document.getElementById("huy");
const themButton = document.getElementById("them");
const submitButton = document.getElementById("submitButton");

// Ngăn chặn sự kiện gửi form mặc định
forms.onsubmit = (e) => {
  e.preventDefault();
};

function them() {
  forms.style.display = "block";
  show.style.display = "none";
}

function submit() {
  var diaChiInput = document.getElementById("dia_chi");

  var productInfo = {
    dia_chi: diaChiInput.value,
    // Thêm thông tin khác nếu cần thiết
  };

  // Sử dụng AJAX để gửi dữ liệu đến máy chủ
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "api/sum_card.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Xử lý kết quả từ máy chủ nếu cần
        var response = JSON.parse(xhr.responseText);
        card.innerHTML = response.result;
        // Cập nhật nội dung thẻ có id là "card" với dữ liệu từ máy chủ
      } else {
        // Xử lý lỗi nếu có
        alert("Có lỗi xảy ra khi thêm vào giỏ hàng");
      }
    }
  };

  // Xóa văn bản trong trường địa chỉ sau khi form được gửi
  diaChiInput.value = "";

  huy();
}

function huy() {
  forms.style.display = "none";
  show.style.display = "block";
}

themButton.onclick = them;
huyButton.onclick = huy;
submitButton.onclick = submit;
