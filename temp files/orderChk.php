<main>
    <h2>以下為結帳商品內容</h2>
    <table id="orderList" class="dataList">
        <tr>
            <th>商品名稱</th>
            <th>數量</th>
            <th>單價</th>
            <th>小計</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="total" colspan="4">結帳金額共計：元整</td>
        </tr>
    </table>
    <h2>請填寫訂貨人及送貨資料</h2>
    <form id="order" class="dataForm" name="order" method="post" action="">
        <p>
            <label for="o_name">收件人姓名：</label>
            <input name="o_name" type="text" id="o_name">
        </p>
        <p>
            <label for="o_phone">聯絡電話：</label>
            <input name="o_phone" type="text" id="o_phone">
        </p>
        <p>
            <label for="o_mobile">行動電話：</label>
            <input name="o_mobile" type="text" id="o_mobile">
        </p>
        <p>
            <label for="o_addr">收件人地址：</label>
            <input name="o_addr" type="text" id="o_addr">
        </p>
        <p class="formBtn">
            <input type="submit" name="submit" id="submit" value="訂購">
            <input type="reset" id="reset" name="reset">
        </p>
    </form>
</main>
