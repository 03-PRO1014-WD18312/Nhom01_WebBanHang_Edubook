let showUser = document.getElementById("userShow");

function showDH(id) {
  User(id);
}
function User(vao) {
  // Lấy thông tin sản phẩm
  var productInfo = {
    id: vao,
    // Thêm thông tin khác nếu cần thiết
  };

  // Sử dụng AJAX để gửi dữ liệu đến máy chủ
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "api/donhang/showUser.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Xử lý kết quả từ máy chủ nếu cần
        var response = JSON.parse(xhr.responseText);
        showUser.innerHTML = response.result;
        // Cập nhật nội dung thẻ có id là "card" với dữ liệu từ máy chủ
      } else {
        // Xử lý lỗi nếu có
        alert("Có lỗi xảy ra");
      }
    }
  };

  // Chuyển đổi object thành JSON và gửi đi
  xhr.send(JSON.stringify(productInfo));
}
