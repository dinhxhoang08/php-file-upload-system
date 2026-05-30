# 1. OBJECTIVE
Tự động gửi email cảm ơn cho người dùng sau khi họ gửi thông tin liên hệ thành công qua form Contact.

# 2. CONTEXT SUMMARY
- Hệ thống hiện tại sử dụng PHP thuần.
- Form liên hệ (`contact.php`) hiện đang lưu thông tin vào cơ sở dữ liệu SQLite (`database.db`).
- Sau khi lưu thành công, hệ thống chỉ hiển thị thông báo thành công trên giao diện.
- Cần tích hợp thêm logic gửi mail vào luồng xử lý POST của `contact.php`.

# 3. APPROACH OVERVIEW
- Sử dụng hàm `mail()` có sẵn của PHP để gửi email đơn giản.
- Luồng thực hiện:
    1. Nhận dữ liệu từ form (đã có).
    2. Lưu vào database (đã có).
    3. Nếu lưu thành công, gọi hàm `mail()` để gửi thư cảm ơn đến địa chỉ email người dùng vừa nhập.
    4. Xử lý lỗi nếu việc gửi mail thất bại (tùy chọn).

# 4. IMPLEMENTATION STEPS
### Bước 1: Cập nhật logic xử lý trong contact.php
- **Mục tiêu**: Thêm mã gửi mail ngay sau khi dữ liệu được lưu thành công vào database.
- **Phương pháp**: Chèn đoạn code gửi mail vào khối `if ($stmt->execute())`.
- **Tham chiếu**: `/workspace/project/contact.php`

### Bước 2: Soạn nội dung email
- **Mục tiêu**: Tạo tiêu đề và nội dung thư cảm ơn chuyên nghiệp.
- **Nội dung dự kiến**:
    - Tiêu đề: "Thank you for contacting us!"
    - Nội dung: "Hi [Name], thank you for your message. We will get back to you soon."

### Bước 3: Cấu hình Headers cho email
- **Mục tiêu**: Đảm bảo email được gửi với định dạng phù hợp (ví dụ: UTF-8) và có thông tin người gửi (From).

# 5. TESTING AND VALIDATION
- Truy cập trang liên hệ trên trình duyệt.
- Điền thông tin vào form (sử dụng một địa chỉ email thật để kiểm tra nếu môi trường hỗ trợ gửi mail).
- Kiểm tra thông báo thành công trên web.
- Kiểm tra hộp thư đến (hoặc thư rác) của email đã nhập để xác nhận đã nhận được thư cảm ơn.
- Lưu ý: Trong môi trường local không có mail server, hàm `mail()` có thể trả về false hoặc yêu cầu cấu hình trong `php.ini`.
