<style>
    .modal-addRate-content{background-color: #ffffff; padding: 30px; font-size: 13px}
    tr:nth-child(odd){
        background-color: #ffffff;
        border-bottom: none;
    }
    td{padding: 2px 5px !important;}
</style>
<div class="modal fade" id="addRate_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 400px">
        <div class="modal-addRate-content">
            <h3>Add Item</h3>
            <table>
                <tr>
                    <td>Pieces</td>
                    <td><input id="pieces" type="text"></td>
                </tr>
                <tr>
                    <td>Gross weight</td>
                    <td><input id="grossw" type="text"></td>
                    <td><select id="unit">
                            <option value=""></option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Rate class</td>
                    <td><select id="class">
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Item number</td>
                    <td><input id="itemno" type="text"></td>
                </tr>
                <tr>
                    <td>Chargeable weight</td>
                    <td><input id="chargeablew" type="text"></td>
                </tr>
                <tr>
                    <td>Rate/Charge</td>
                    <td><input id="rcharge" type="text"></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><input id="total" type="text"></td>
                </tr>
                <tr>
                    <td>Nature and quantity</td>
                    <td><textarea id="nature" type="text" rows="6"></textarea></td>
                </tr>
                <tr><td style="width: 100%;text-align:right"></td></tr>
            </table>
            <div style="text-align: right"><input type="button" class="btn" data-dismiss="modal" value="Cancel"> <input class="btn" onclick="appendRate()" type="button" value="Add"></div>
        </div>
    </div>
</div>
