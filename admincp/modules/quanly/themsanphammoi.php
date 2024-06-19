<div class="admin-prd">
    <h2>Thêm Sản phẩm</h2>
    <form class="form-container" action="modules/xuly/xulythemsanpham.php" method="POST" enctype="multipart/form-data">
        <label class="form-label" for="hinhAnh">Hình ảnh:</label>
        <input class="form-input form-file-input" type="file" id="hinhAnh" name="hinhAnh" >

        <label class="form-label" for="tenSanPham">Tên sản phẩm:</label>
        <input class="form-input" type="text" id="tenSanPham" name="tenSanPham" required>

        <label class="form-label" for="moTaSanPham">Mô tả sản phẩm:</label>
        <textarea class="form-input" id="moTaSanPham" name="moTaSanPham" required></textarea>

        <label class="form-label" for="danhMuc">Danh mục:</label>
        <select style="width: 200px;height: 30px;border: 1px solid #ccc;border-radius: 4px;padding: 5px;font-size: 14px;color: #333;background-color: #fff;" name="danhMuc"  required>
            <option value="Nước Hoa Nam">Nước Hoa Nam</option>
            <option value="Nước Hoa Nữ">Nước Hoa Nữ</option>
            <option value="Nước Hoa Unisex">Nước Hoa Unisex</option>
        </select>

        <label class="form-label" for="thuongHieu">Thương hiệu:</label>
        <input class="form-input" type="text" id="thuongHieu" name="thuongHieu" required>

        <label class="form-label" for="soLuong">Số lượng:</label>
        <input class="form-input" type="number" id="soLuong" name="soLuong" required>

        <label class="form-label" for="gia">Giá:</label>
        <input class="form-input" type="number" id="gia" name="gia" required>

        <label class="form-label" for="kichCo">Kích cỡ:</label>
        <input class="form-input" type="text" id="kichCo" name="kichCo" required>

        <input class="form-submit-button" type="submit" value="Thêm sản phẩm" name="themSanPham">
    </form>

</div>