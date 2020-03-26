<?php

use Illuminate\Database\Seeder;
use App\Models\Rules;
class RulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rules::insert([
            [
                'title' => 'Quy định đăng tin trên Chợ Sinh Viên',
                'alias' => 'quy-dinh-dang-tin-tren-cho-sinh-vien',
                'content' => '<p><strong>1. Th&ocirc;ng tin li&ecirc;n lạc</strong></p>

                <ul>
                    <li><strong>T&ecirc;n:&nbsp;</strong>Điền đầy đủ họ t&ecirc;n thật của người b&aacute;n.</li>
                    <li><strong>Email:&nbsp;</strong>H&atilde;y cung cấp địa chỉ email thật. Ch&uacute;ng t&ocirc;i li&ecirc;n lạc với bạn chủ yếu qua email. Email của bạn sẽ được Chợ Sinh Viên bảo mật.</li>
                    <li><strong>Số điện thoại:&nbsp;</strong>Để đảm bảo an to&agrave;n mua b&aacute;n, bạn cần x&aacute;c nhận sở hữu của số điện thoại d&ugrave;ng để đăng tin.</li>
                </ul>
                
                <p><strong>2. Ti&ecirc;u đề tin đăng</strong></p>
                
                <ul>
                    <li>Ti&ecirc;u đề cần thể hiện chi tiết ch&iacute;nh của mặt h&agrave;ng hoặc dịch vụ được quảng c&aacute;o, bao gồm c&aacute;c th&ocirc;ng tin như:
                    <ul>
                        <li>T&ecirc;n sản phẩm, model, t&igrave;nh trạng &hellip;. (V&iacute; dụ: Iphone 5S 16gb c&ograve;n bảo h&agrave;nh &hellip;)</li>
                        <li>Loại nh&agrave; đất, t&ecirc;n đường, số ph&ograve;ng ngủ&hellip; (đối với bất động sản). V&iacute; dụ: Nh&agrave; 3 lầu 6 ph&ograve;ng ngủ đường Nguyễn Tr&atilde;i &hellip;)</li>
                    </ul>
                    </li>
                    <li>Tr&ecirc;n ti&ecirc;u đề tin, kh&ocirc;ng sử dụng c&aacute;c th&ocirc;ng tin/ từ ngữ sau:
                    <ul>
                        <li>C&aacute;c từ kho&aacute; :&nbsp;<em>cần mua/ mua, cần b&aacute;n/ b&aacute;n, tuyển/t&igrave;m, thanh l&yacute;,&nbsp;</em>&hellip;</li>
                        <li>Gi&aacute;, website, t&ecirc;n hoặc th&ocirc;ng tin li&ecirc;n lạc của người b&aacute;n.</li>
                        <li>C&aacute;c từ ngữ mi&ecirc;u tả nhằm thu h&uacute;t sự ch&uacute; &yacute; của người mua như:&nbsp;<em>si&ecirc;u rẻ, si&ecirc;u hot, rất đẹp, đẹp, khuyến m&atilde;i</em>,&nbsp;<em>gấp, giảm gi&aacute;</em>&nbsp;hoặc c&aacute;c từ ngữ kh&ocirc;ng được ph&eacute;p theo luật quảng c&aacute;o như :&nbsp;<em>nhất, tốt nhất, rẻ nhất, số 1, h&agrave;ng đầu</em>&nbsp;hoặc từ ngữ c&oacute; &yacute; nghĩa tương tự.</li>
                    </ul>
                    </li>
                </ul>
                
                <p><strong>3. H&igrave;nh ảnh trong tin đăng</strong></p>
                
                <p>H&igrave;nh ảnh trong tin đăng phải l&agrave; h&igrave;nh chụp từ mặt h&agrave;ng, dịch vụ bạn đăng b&aacute;n, v&agrave; phải thể hiện r&otilde; &amp; ch&acirc;n thực mặt h&agrave;ng dịch vụ đ&oacute;.</p>
                
                <p><strong>H&igrave;nh ảnh kh&ocirc;ng được ph&eacute;p đăng tr&ecirc;n&nbsp;</strong><strong>Chợ Sinh Viên</strong>&nbsp;<strong>bao gồm:</strong></p>
                
                <ul>
                    <li>H&igrave;nh tải từ Internet hoặc tải từ&nbsp;Chợ Sinh Vi&ecirc;n.</li>
                    <li>H&igrave;nh đ&atilde; bị chỉnh sửa qu&aacute; nhiều hoặc bị tẩy x&oacute;a, kh&ocirc;ng cho thấy được t&igrave;nh trạng thật của sản phẩm.</li>
                    <li>H&igrave;nh c&oacute; chứa đường link li&ecirc;n kết, chữ, số điện thoại, t&ecirc;n cửa h&agrave;ng/c&ocirc;ng ty.</li>
                    <li>H&igrave;nh mờ, nghi&ecirc;ng, kh&ocirc;ng đ&uacute;ng chiều, h&igrave;nh được gh&eacute;p từ nhiều h&igrave;nh kh&aacute;c, c&oacute; c&aacute;c k&yacute; tự hoặc k&yacute; hiệu lạ nhằm thu h&uacute;t sự ch&uacute; &yacute; của người xem.</li>
                    <li>H&igrave;nh c&oacute; logo c&ocirc;ng ty, ngoại trừ trong c&aacute;c chuy&ecirc;n mục &ldquo;Dịch Vụ&rdquo;, &ldquo;Việc L&agrave;m&rdquo; v&agrave; hoạt động mua b&aacute;n thương hiệu trong chuy&ecirc;n mục &ldquo;Cơ sở thương mại&rdquo;.</li>
                    <li>H&igrave;nh người mẫu mặc đồ l&oacute;t, đồ bơi.</li>
                    <li>H&igrave;nh bị lỗi kh&ocirc;ng hiển thị.</li>
                </ul>
                
                <p><strong>4. Nội dung tin đăng</strong></p>
                
                <p>Nội dung tin đăng cần c&oacute; đầy đủ th&ocirc;ng tin để người mua c&oacute; thể quyết định mua h&agrave;ng. Cụ thể như sau:</p>
                
                <ul>
                    <li><em>Bất động sản</em>: Mi&ecirc;u tả chi tiết vị tr&iacute;, số ph&ograve;ng, diện t&iacute;ch, t&ecirc;n dự &aacute;n, căn hộ, t&ecirc;n đường, t&igrave;nh trạng sở hữu, &hellip;</li>
                    <li><em>Xe cộ</em>: Mi&ecirc;u tả t&ecirc;n xe, h&atilde;ng xe, xuất xứ, m&agrave;u sắc, t&igrave;nh trạng sử dụng, số km đ&atilde; đi, năm đăng k&iacute;, hộp số, loại nhi&ecirc;n liệu, giấy tờ xe, &hellip;</li>
                    <li><em>C&aacute;c sản phẩm kh&aacute;c</em>: T&ecirc;n sản phẩm, h&atilde;ng, xuất xứ, m&agrave;u sắc, chất liệu, t&igrave;nh trạng sử dụng, phụ kiện đi k&egrave;m, gi&aacute; tiền, t&igrave;nh trạng bảo h&agrave;nh, &hellip;</li>
                </ul>
                
                <p>Số điện thoại, c&aacute;c đường dẫn kết nối đến trang kh&aacute;c, email c&oacute; chứa t&ecirc;n miền website kh&aacute;c kh&ocirc;ng được ph&eacute;p mi&ecirc;u tả ở nội dung.</p>
                
                <p>Nếu c&oacute; nhiều hơn một sản phẩm/dịch vụ, vui l&ograve;ng đăng tin ri&ecirc;ng biệt cho từng sản phẩm/dịch vụ.</p>
                
                <p>Chợ Sinh Viên chỉ đăng những tin mua b&aacute;n 1 sản phẩm hoặc dịch vụ cụ thể. Tin rao chỉ nhằm mục đ&iacute;ch quảng c&aacute;o về c&ocirc;ng ty sẽ kh&ocirc;ng được đăng. C&aacute;c tin rao kh&ocirc;ng nhằm mục đ&iacute;ch mua b&aacute;n kh&ocirc;ng được đăng.</p>
                
                <p>C&aacute;c tin đăng c&oacute; nội dung, h&igrave;nh ảnh mang t&iacute;nh x&uacute;c phạm li&ecirc;n quan đến t&ocirc;n gi&aacute;o, c&aacute;c nh&oacute;m sắc tộc, c&aacute; nh&acirc;n hoặc người nổi tiếng bị cấm.</p>
                
                <p>Theo điều 8 mục 11 của Luật Quảng c&aacute;o, kh&ocirc;ng được sử dụng c&aacute;c từ ngữ&nbsp;<em>&ldquo;nhất&rdquo;, &ldquo;duy nhất&rdquo;, &ldquo;tốt nhất&rdquo;, &ldquo;số một&rdquo;</em>&nbsp;hoặc từ ngữ c&oacute; &yacute; nghĩa tương tự trong nội dung tin đăng (nếu sử dụng phải c&oacute; t&agrave;i liệu chứng minh).</p>
                
                <p><strong>5. Gi&aacute;</strong></p>
                
                <p><strong>Chợ Sinh Vi&ecirc;n&nbsp;</strong>c&oacute; quyền từ chối c&aacute;c sản phẩm c&oacute; gi&aacute; b&aacute;n kh&ocirc;ng hợp l&yacute;.&nbsp;Gi&aacute; b&aacute;n phải được ni&ecirc;m yết bằng gi&aacute; Việt Nam Đồng. C&aacute;c tin đăng gi&aacute; ngoại tệ đều kh&ocirc;ng được đăng.</p>
                
                <p>Nếu sản phẩm/dịch vụ của bạn l&agrave; sản phẩm ch&iacute;nh h&atilde;ng nhưng rao b&aacute;n với gi&aacute; thấp hơn sản phẩm/dịch vụ tương tự tr&ecirc;n thị trường,&nbsp;vui l&ograve;ng sửa lại tin theo hướng dẫn sau:</p>
                
                <p>1. Th&ecirc;m h&igrave;nh để chứng thực sản phẩm h&agrave;ng ch&iacute;nh h&atilde;ng.<br />
                2. Hoặc mi&ecirc;u tả chi tiết hơn về t&igrave;nh trạng sản phẩm:</p>
                
                <ul>
                    <li>Thời gian sử dụng</li>
                    <li>T&igrave;nh trạng sản phẩm</li>
                    <li>Gi&aacute; tiền l&uacute;c bạn mua</li>
                    <li>L&yacute; do bạn b&aacute;n rẻ hơn gi&aacute; thị trường.</li>
                </ul>
                
                <p>Quy định về gi&aacute; được đặt ra nhằm bảo đảm an to&agrave;n v&agrave; hiệu quả cho cả người mua v&agrave; người b&aacute;n.</p>
                
                <p><strong>6. Ng&ocirc;n ngữ</strong></p>
                
                <p><strong>Chợ Sinh Vi&ecirc;n&nbsp;</strong>chỉ sử dụng hai ng&ocirc;n ngữ l&agrave; tiếng Anh v&agrave; tiếng Việt c&oacute; dấu.</p>
                
                <p>C&aacute;c tin viết bằng ng&ocirc;n ngữ kh&aacute;c, hoặc viết bằng tiếng Việt kh&ocirc;ng dấu, hoặc viết bằng tiếng Việt nhưng nội dung kh&oacute; hiểu (k&yacute; hiệu lạ, ph&ocirc;ng chữ lạ) cũng kh&ocirc;ng được ph&eacute;p đăng.</p>
                
                <p>Nếu vi phạm c&aacute;c quy định tr&ecirc;n, tin đăng của bạn c&oacute; thể bị từ chối. Bạn n&ecirc;n tham khảo&nbsp;<strong>C&aacute;c l&yacute; do tin bị từ chối</strong>&nbsp;ở mục C b&ecirc;n dưới.</p>',
                'id_category' => 1
            ],
            [
                'title' => 'Quy định về Hàng hoá/Dịch vụ trên website Chợ Sinh Viên',
                'alias' => 'quy-dinh-ve-hang-hoadich-vu-tren-website-cho-sinh-vien',
                'content' => '<h3><strong>A. H&agrave;ng h&oacute;a v&agrave; dịch vụ bị cấm theo ph&aacute;p luật Việt Nam</strong></h3>

                <ul>
                    <li><strong>&nbsp;H&agrave;ng h&oacute;a bất hợp ph&aacute;p:&nbsp;</strong>C&aacute;c h&agrave;ng h&oacute;a bị cấm bu&ocirc;n b&aacute;n theo luật ph&aacute;p Việt Nam, bao gồm:
                
                    <ul>
                        <li>Ma t&uacute;y.</li>
                        <li>H&agrave;ng h&oacute;a c&oacute; chứa h&igrave;nh ảnh li&ecirc;n quan đến cần sa, hoa anh t&uacute;c.</li>
                        <li>Vũ kh&iacute; v&agrave; c&aacute;c sản phẩm thuộc lĩnh vực qu&acirc;n sự, an ninh quốc ph&ograve;ng kh&aacute;c, bao gồm nhưng kh&ocirc;ng giới hạn bởi qu&acirc;n trang, qu&acirc;n hiệu, ph&ugrave; hiệu, thiết bị qu&acirc;n sự, cấp hiệu.</li>
                        <li>Bộ phận cơ thể người.</li>
                        <li>Thực vật, Động vật nguy cấp, qu&yacute; hiếm.</li>
                        <li>Sản phẩm khi&ecirc;u d&acirc;m.</li>
                        <li>Ph&aacute;o hoa v&agrave; chất nổ.</li>
                        <li>Số xe v&agrave; giấy tờ xe.</li>
                        <li>B&igrave;nh sữa, n&uacute;m v&uacute; b&igrave;nh sữa&nbsp;(Ngoại trừ sản phẩm cho mẹ v&agrave; b&eacute; chưa sử dụng: miếng thấm h&uacute;t sữa, t&uacute;i trữ sữa,&hellip; hoặc sản phẩm cho b&eacute;: m&aacute;y h&acirc;m sữa, m&aacute;y vắt sữa &hellip;)</li>
                    </ul>
                    </li>
                    <li><strong>H&agrave;ng giả, h&agrave;ng nhập lậu, h&agrave;ng vi phạm bản quyền:&nbsp;</strong>Tất cả c&aacute;c sản phẩm sau đ&acirc;y khi đăng tin tr&ecirc;n&nbsp;<strong>Chợ Sinh Viên&nbsp;</strong>phải được chứng thực l&agrave; h&agrave;ng ch&iacute;nh h&atilde;ng:
                    <ul>
                        <li>Sản phẩm c&oacute; thương hiệu.</li>
                        <li>CD/VCD/DVD.</li>
                        <li>Chương tr&igrave;nh m&aacute;y vi t&iacute;nh/ m&aacute;y chơi tr&ograve; chơi.</li>
                    </ul>
                    </li>
                </ul>
                
                <h3><strong>B. H&agrave;ng h&oacute;a v&agrave; dịch vụ bị cấm theo&nbsp;quy định của Chợ Sinh Vi&ecirc;n</strong></h3>
                
                <ul>
                    <li><strong>C&aacute;c sản phẩm trong ng&agrave;nh y tế</strong>:
                
                    <ul>
                        <li>C&aacute;c sản phẩm y tế, bao gồm cả m&aacute;y m&oacute;c y tế.</li>
                        <li>Thuốc v&agrave; thuốc bổ cho người lớn/ trẻ em v&agrave; vật nu&ocirc;i.</li>
                        <li>Dược phẩm, thảo dược&nbsp;(Ngoại trừ tinh dầu).</li>
                        <li>Y học cổ truyền Ấn Độ.</li>
                        <li>Thuốc theo đơn.</li>
                    </ul>
                    </li>
                    <li><strong>C&aacute;c mặt h&agrave;ng dễ g&acirc;y dị ứng, c&oacute; thể ảnh hưởng đến sức khoẻ của người d&ugrave;ng:</strong>
                    <ul>
                        <li>Quần &aacute;o l&oacute;t đ&atilde; qua sử dụng.</li>
                        <li>K&iacute;nh &aacute;p tr&ograve;ng, k&iacute;nh cận.</li>
                        <li>Sữa d&ugrave;ng cho trẻ em dưới 24 th&aacute;ng tuổi, sản phẩm dinh dưỡng d&agrave;nh cho trẻ dưới 6 th&aacute;ng tuổi (Ngoại Trừ Sữa chưa sử dụng, dạng lỏng như sữa hộp, sữa tươi).</li>
                        <li>Bia, cồn, rượu, thuốc l&aacute;, c&aacute;c chất k&iacute;ch th&iacute;ch, g&acirc;y nghiện kh&aacute;c.</li>
                        <li>Mỹ phẩm dạng uống, ti&ecirc;m&nbsp;(Ngoại trừ Mỹ Phẩm chưa sử dụng dạng d&ugrave;ng ngo&agrave;i da, c&oacute; t&aacute;c dụng l&agrave;m sạch, l&agrave;m thơm, dưỡng, trang điểm).</li>
                    </ul>
                    </li>
                    <li><strong>C&aacute;c sản phẩm c&oacute; nội dung người lớn:</strong>&nbsp;Đồ chơi t&igrave;nh dục, sản phẩm khi&ecirc;u d&acirc;m.</li>
                    <li><strong>Sản phẩm được bảo vệ bởi luật sở hữu tr&iacute; tuệ:</strong>
                    <ul>
                        <li>Bản ghi Radio, bản thu TV v&agrave; bản thu từ Internet.</li>
                        <li>S&aacute;ch điện tử.</li>
                        <li>Địa chỉ email.</li>
                    </ul>
                    </li>
                    <li><strong>C&aacute;c tin đăng kh&ocirc;ng nhằm mục đ&iacute;ch mua b&aacute;n h&agrave;ng ho&aacute;, dịch vụ:</strong>
                    <ul>
                        <li>Sự kiện hội họp.</li>
                        <li>C&aacute;c t&agrave;i liệu tuy&ecirc;n truyền.</li>
                        <li>Thư/ Lời ch&uacute;c mừng/ Th&ocirc;ng b&aacute;o.</li>
                    </ul>
                    </li>
                    <li><strong>C&aacute;c sản phẩm m&ecirc; t&iacute;n:</strong>&nbsp;B&ugrave;a hộ mạng hoặc mi&ecirc;u tả m&ecirc; t&iacute;n (đuổi t&agrave;, đuổi quỷ &hellip;) v&agrave; tất cả c&aacute;c vật thần b&iacute;.</li>
                    <li><strong>C&aacute;c sản phẩm phục vụ cho mục đ&iacute;ch cờ bạc</strong>&nbsp;(bao gồm cả m&aacute;y đ&aacute;nh b&agrave;i).</li>
                    <li><strong>C&aacute;c sản phẩm thuộc về di t&iacute;ch lịch sử.</strong></li>
                    <li><strong>Ho&aacute; chất:</strong>&nbsp;bao gồm nhưng kh&ocirc;ng giới hạn bởi a-x&iacute;t, chất ho&aacute; học n&ocirc;ng nghiệp, chất ph&oacute;ng xạ, sản phẩm ho&aacute; học diệt c&ocirc;n tr&ugrave;ng.</li>
                    <li><strong>C&aacute;c sản phẩm c&oacute; chứa a-mi-ăng.</strong></li>
                    <li><strong>C&aacute;c mặt h&agrave;ng kh&aacute;c:</strong>
                    <ul>
                        <li>Số điện thoại di động v&agrave; thẻ Sim.</li>
                        <li>B&igrave;nh h&uacute;t shisa, cần sa, hoa anh t&uacute;c (bao gồm sản phẩm c&oacute; h&igrave;nh cần sa v&agrave; hoa anh t&uacute;c).</li>
                        <li>V&agrave;ng thỏi, v&agrave;ng miếng (Ngoại trừ V&agrave;ng trang sức).</li>
                        <li>C&aacute;c sản phẩm li&ecirc;n quan đến &ldquo;Bản đồ&rdquo; bao gồm sản phẩm bản đồ (bản đồ thế giới, bản đồ địa phương, &hellip;), quả địa cầu, đồ chơi li&ecirc;n quan đến bản đồ, sản phẩm c&oacute; h&igrave;nh ảnh hoặc mi&ecirc;u tả về bản đồ (đặc biệt l&agrave; về &ldquo;đường lưỡi b&ograve;&rdquo;).</li>
                    </ul>
                    </li>
                    <li><strong>Mặt h&agrave;ng đ&atilde; hết hạn sử dụng tại thời điểm đăng tin.</strong></li>
                </ul>
                
                <ul>
                    <li><strong>Dịch vụ bị cấm theo quy định của Chợ Sinh Vi&ecirc;n:</strong>
                
                    <ul>
                        <li>Cho vay v&agrave; t&aacute;i cấp vốn.</li>
                        <li>Dịch vụ li&ecirc;n quan m&ecirc; t&iacute;n, yểm b&ugrave;a.</li>
                        <li>Dịch vụ mai mối v&agrave; hẹn h&ograve;.</li>
                        <li>C&aacute;c phương ph&aacute;p trị liệu.</li>
                        <li>Kế hoạch l&agrave;m gi&agrave;u nhanh ch&oacute;ng, tiếp thị đơn cấp v&agrave; tiếp thị đa cấp.</li>
                        <li>Dịch vụ đi chung xe.</li>
                        <li>Dịch vụ bẻ kh&oacute;a, c&agrave;i c&aacute;c ứng dụng lậu cho c&aacute;c thiết bị.</li>
                        <li>Bảo hiểm v&agrave; c&aacute;c chương tr&igrave;nh bảo hiểm y tế.</li>
                        <li>Chăm s&oacute;c v&agrave; gi&aacute;m s&aacute;t trẻ em.</li>
                        <li>Dịch vụ nhắn tin SMS.</li>
                        <li>L&agrave;m người mẫu.</li>
                        <li>Dịch vụ xăm h&igrave;nh.</li>
                        <li>Dịch vụ l&agrave;m hoặc b&aacute;n chứng chỉ/bằng cấp.</li>
                        <li>M&aacute;t-xa v&agrave; chăm s&oacute;c tại Spa (bao gồm cả phiếu Vouchers của c&aacute;c dịch vụ tr&ecirc;n).</li>
                        <li>Dịch vụ th&aacute;m tử, theo d&otilde;i hoặc c&aacute;c dịch vụ kh&aacute;c vi phạm Quyền b&iacute; mật đời tư được quy định tại Điều 38 Bộ luật D&acirc;n sự 2005.</li>
                    </ul>
                    </li>
                </ul>
                
                <ul>
                    <li><strong>V&agrave; c&aacute;c mặt h&agrave;ng/ dịch vụ kh&aacute;c được quy định tại c&aacute;c thời điểm.</strong></li>
                </ul>',
                'id_category' => 1
            ],
            [
                'title' => 'Mẹo cho người MUA',
                'alias' => 'meo-cho-nguoi-mua',
                'content' => '<h3>Nguy&ecirc;n tắc &ldquo;v&agrave;ng&rdquo;:</h3>

                <ul>
                    <li><strong>Kh&ocirc;ng n&ecirc;n chuyển tiền trước khi nhận h&agrave;ng</strong>, đặc biệt đối với những h&agrave;ng ho&aacute; đắt tiền như: đồ điện tử, xe cộ, th&uacute; cưng.</li>
                    <li><strong>Gặp nhau trực tiếp để mua b&aacute;n. Kiểm tra kỹ h&agrave;ng mới trả tiền.</strong></li>
                    <li><strong>Lu&ocirc;n đi c&ugrave;ng 1 người bạn.</strong></li>
                    <li>Giao dịch trực tiếp ở nơi quen thuộc như địa điểm gần nh&agrave;, c&ocirc;ng ty hoặc c&aacute;c trung t&acirc;m bảo h&agrave;nh c&oacute; thể kiểm tra được sản phẩm.</li>
                    <li>Thận trọng đối với sản phẩm h&agrave;ng hiệu, đắt tiền nhưng c&oacute; gi&aacute; thấp đ&aacute;ng ngờ.</li>
                    <li>Y&ecirc;u cầu giấy tờ để chứng minh sở hữu mặt h&agrave;ng hoặc giấy tờ cho việc giao dịch giữa bạn v&agrave; người b&aacute;n, đặc biệt c&aacute;c mặt h&agrave;ng c&oacute; gi&aacute; trị cao.<strong>&nbsp;</strong></li>
                    <li>Kiểm tra kỹ c&aacute;c giấy tờ sản phẩm khi giao dịch, đặc biệt đối với những mặt h&agrave;ng như:
                    <ul>
                        <li>Xe m&aacute;y: C&agrave;-vẹt xe, bảo hiểm xe (nếu c&oacute;), bi&ecirc;n lai mua xe, giấy bảo h&agrave;nh xe cũng như giấy tờ t&ugrave;y th&acirc;n của người giao dịch với bạn: Chứng minh nh&acirc;n d&acirc;n, bằng l&aacute;i xe.</li>
                        <li>Nh&agrave; đất: Giấy tờ ph&aacute;p l&yacute; (Giấy chứng nhận quyền sử dụng đất, quyền sở hữu nh&agrave; ở v&agrave; t&agrave;i sản).</li>
                    </ul>
                    </li>
                    <li>Bảo quản t&agrave;i sản c&aacute; nh&acirc;n của bạn cẩn thận khi tham gia giao dịch.</li>
                    <li>Đối với một số&nbsp;sản phẩm đặc th&ugrave; (gia cầm sống, động vật sống,&nbsp;sản phẩm ch&iacute;nh h&atilde;ng, thực phẩm, &hellip;), người mua cần y&ecirc;u cầu người b&aacute;n cung cấp c&aacute;c giấy tờ chứng minh nguồn gốc, chất lượng sản phẩm hoặc c&aacute;c giấy tờ kh&aacute;c theo quy định của Nh&agrave; nước nhằm&nbsp;đảm bảo quyền lợi v&agrave; sức khỏe của bản th&acirc;n.</li>
                </ul>
                
                <h3>Những trường hợp gian lận cần cảnh gi&aacute;c</h3>
                
                <ul>
                    <li><strong>Người mua đ&atilde; thanh to&aacute;n (chuyển khoản qua ng&acirc;n h&agrave;ng, chuyển qua bưu điện) nhưng kh&ocirc;ng nhận được h&agrave;ng do người b&aacute;n kh&ocirc;ng giao h&agrave;ng.</strong></li>
                    <li>Tr&aacute;o điện thoại, m&aacute;y t&iacute;nh bảng, đồ điện tử kh&aacute;c: Người b&aacute;n mua h&agrave;ng sản phẩm ch&iacute;nh h&atilde;ng v&agrave; khi kiểm tra h&agrave;ng th&igrave; l&agrave; ch&iacute;nh h&atilde;ng, nhưng sau khi người mua trả tiền, người b&aacute;n nhanh tay tr&aacute;o bằng h&agrave;ng giả.</li>
                </ul>',
                'id_category' => 2
            ],
            [
                'title' => 'Mẹo cho người BÁN',
                'alias' => 'meo-cho-nguoi-ban',
                'content' => '<h3>Nguy&ecirc;n tắc &ldquo;v&agrave;ng&rdquo;:</h3>

                <ul>
                    <li><strong>Gặp nhau trực tiếp để mua b&aacute;n.</strong></li>
                    <li><strong>Lu&ocirc;n đi c&ugrave;ng 1 người bạn.</strong></li>
                    <li>Để tr&aacute;nh trường hợp ph&aacute;t sinh m&acirc;u thuẫn sau khi b&aacute;n, n&ecirc;n trao đổi chi tiết c&aacute;c điều khoản khi giao dịch v&agrave; y&ecirc;u cầu người mua kiểm tra h&agrave;ng h&oacute;a cẩn thận trong qu&aacute; tr&igrave;nh giao dịch.</li>
                    <li>N&ecirc;n thận trọng đối với những giao dịch quốc tế hoặc y&ecirc;u cầu chuyển h&agrave;ng/chuyển tiền ra nước ngo&agrave;i.</li>
                    <li>Chợ Sinh Viên&nbsp;<strong>KH&Ocirc;NG NHẬN</strong>&nbsp;k&yacute; gửi, b&aacute;n h&agrave;ng cho người d&ugrave;ng.</li>
                    <li>Thận trọng nếu c&oacute; ai li&ecirc;n hệ với bạn để thu ph&iacute; dưới danh nghĩa Chợ Sinh Viên. H&atilde;y li&ecirc;n lạc ngay với ch&uacute;ng t&ocirc;i để được hỗ trợ kịp thời.</li>
                    <li>Bảo quản h&agrave;ng ho&aacute; v&agrave; t&agrave;i sản c&aacute; nh&acirc;n của bạn cẩn thận khi tham gia giao dịch.</li>
                    <li>Kh&ocirc;ng giao h&agrave;ng h&oacute;a khi chưa c&oacute; g&igrave; đảm bảo như giấy tờ t&ugrave;y th&acirc;n hoặc tiền đặt cọc.</li>
                </ul>
                
                <h3>Những trường hợp gian lận cần cảnh gi&aacute;c</h3>
                
                <ul>
                    <li>Người mua l&agrave;m giả giấy chuyển khoản, khiến người b&aacute;n giao h&agrave;ng nhưng kh&ocirc;ng nhận được tiền.</li>
                    <li>Người mua phương tiện di chuyển (xe đạp, xe m&aacute;y, &hellip;) xin được d&ugrave;ng thử v&agrave; kh&ocirc;ng trả lại cho người b&aacute;n sau khi d&ugrave;ng.</li>
                </ul>',
                'id_category' => 2
            ],
        ]);   
    }
}
