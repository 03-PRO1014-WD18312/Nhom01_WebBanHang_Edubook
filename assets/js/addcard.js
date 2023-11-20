const add = document.getElementById("add_card");
add.onclick = function () {
  // Tạo một đối tượng XMLHttpRequest để thực hiện yêu cầu HTTP
  let xhr = new XMLHttpRequest();

  // Cấu hình yêu cầu: gửi yêu cầu POST đến "api/insert-chat.php" và sử dụng chế độ bất đồng bộ
  xhr.open("POST", "api/add_card.php", true);

  // Xử lý sự kiện khi yêu cầu hoàn thành
  xhr.onload = () => {
    // Kiểm tra xem yêu cầu đã hoàn thành thành công và trả về mã HTTP 200 (OK)
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      // Đặt giá trị của trường nhập là chuỗi rỗng, xóa nội dung đã gửi
      inputField.value = "";

      // Cuộn hộp chat xuống dưới cùng để hiển thị tin nhắn mới nhất
      scrollToBottom();
    }
  };

  // Tạo một đối tượng FormData để chứa dữ liệu biểu mẫu từ form
  let formData = new FormData(form);

  // Gửi yêu cầu XMLHttpRequest với dữ liệu biểu mẫu
  xhr.send(formData);
};
