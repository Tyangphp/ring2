/*聚焦隐藏*/
$(function () {
    try {
        /*真爱验证（弹窗）*/
        clearDefault("sirname", "先生姓名");
        clearDefault("password", "身份证号码");
        /*登录注册*/
        clearDefault("dr_email", "邮箱/用户名/昵称");
        clearDefault("dr_yzm", "请输入验证码");
        clearDefault("dr_email", "请输入邮箱地址");
        clearDefault("dr_phone", "请输入手机号码");
        clearDefault("dr_nc", "英文字母或中文名称");
        /*购物车*/
        clearDefault("true_name", "请准确填写真实姓名");
        clearDefault("adt_1", "请填写详细路名及门牌号");
        clearDefault("true_number", "请填写邮政编码");
        clearDefault("shop_adress-text", "  此处请勿填写有关支付等方面的信息。留言请在50字以内。");
        /*预约门店*/
        clearDefault("name_txt", "X先生/女士");
        clearDefault("phone_txt", "手机号码");
    }
    catch (e) { }
});