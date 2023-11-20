const add = document.getElementById("add_card");
const form = document.querySelector(".add_card");
function addToCart(id) {
  //   // Lấy thông tin sản phẩm
  var productInfo = {
    id: id,
    // Thêm thông tin khác nếu cần thiết
  };

  // Sử dụng AJAX để gửi dữ liệu đến máy chủ
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "api/add_card.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Xử lý kết quả từ máy chủ nếu cần
      alert(id);
      console.log(xhr.responseText);
    }
  };
  // Chuyển đổi object thành JSON và gửi đi
  xhr.send(JSON.stringify(productInfo));
}
