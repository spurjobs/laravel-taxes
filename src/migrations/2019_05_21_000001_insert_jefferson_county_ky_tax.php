<?php

use Appleton\Taxes\Countries\US\Kentucky\JeffersonCounty\JeffersonCounty;
use Appleton\Taxes\Models\TaxArea;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertJeffersonCountyKyTax extends Migration
{
    protected $governmental_unit_areas = 'governmental_unit_areas';
    protected $taxes = 'taxes';
    protected $tax_areas = 'tax_areas';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $jefferson_county_gua_id = DB::table($this->governmental_unit_areas)->insertGetId([
            'name' => 'Jefferson County, KY',
            'area' => '0106000020E610000001000000010300000001000000DC0000005CE509849D7C55C09F5912A0A6004340267156444D7C55C086AB0320EE004340BE81C98D227C55C031E884D0410143404C16F71F997B55C0DB12B9E00C024340575A46EA3D7B55C0BCC96FD1C9024340D5E76A2BF67A55C015359886E1034340B9F94674CF7A55C01DE1B4E0450543406475ABE7A47A55C0F0BC546CCC07434096CF5A5A957A55C0C8F30F0C57084340CCB392567C7A55C032CB9E04360943405EF0694E5E7A55C061C3D32B6509434013EF8015187A55C04BF1FAD6A80A4340AA36C9A3027A55C0D42B2EAE0B0B4340910BCEE0EF7955C080441328620B4340588CBAD6DE7955C0A609DB4FC60C43400F61FC34EE7955C08AC8B08A370E43407B71054AEE7955C0F3972095380E43400589803FFD7955C061F7BF0DF60E43402C0B26FE287A55C084B7072120114340B8AD2D3C2F7A55C0D97BF1457B124340683A3B191C7A55C0F017B325AB14434031AF230ED97955C0156EF9484A164340F3690DC1927955C08ABBEFBD14174340C8005E93467955C05684EB1FF01743405E622CD32F7955C00ABABDA43118434027F6D03E567855C09602D2FE071A43400ED3EA4FF97755C0BF398102931A434049BA66F2CD7755C09944BDE0D31A4340E9100DEE697755C0A7DC7903521B4340ACD35908CC7655C00DFB0025191C4340F99E91088D7655C0EECD6F98681C43409795CEBB697655C0FED0F02FB91C43404EC5234C1A7655C0C50B918B6E1D434048179B560A7655C032E719FB921D4340DAEA6714F07555C0E70BA429E91D43408CD7BCAAB37555C08E739B70AF1E43400F8939F2A57555C09E89D776551F43405FB532E1977555C0DC291DACFF1F43407DD0C443987555C020D4C7BD1D20434051A7F2A89B7555C092366EE22621434051853FC39B7555C094D74AE82E214340EC9E2D4E8B7555C0EE7A68D6B62143408D7DC9C6837555C059FAD005F52143406388A4CD607555C07B110EE465224340969E2789417555C06678B8CCCA2243407A54FCDF117555C08B8A389D6423434059A0DD21C57455C08102EFE4D323434035A1F43DB87455C0F06455DEDC23434019B0F4A3B77455C05C5F8C49DD2343403000F200577455C018BDDD90202443401E32E543507455C064E8D84125244340C0CE4D9B717355C00A4B3CA06C244340F0E73CB35A7355C01A8C8D8E74244340378494705A7355C099C1A1A5742443403E05C078067355C05CC823B89124434018CBF44BC47255C01C06F357C82443401BAEBA07A17255C091732060D5244340DC4598A25C7255C08C683BA6EE244340C092AB58FC7155C027D714C8EC24434069CF43CFE37155C0E87F19D7D22443407F2C4487C07155C05A66118AAD244340D4EFC2D66C7155C0D594641D8E244340F33977BB5E7155C0A6D0798D5D244340F1811DFF057155C09ED0EB4FE223434098840B79047155C07D737FF5B8234340F92EA52E197155C0AD32535A7F234340F3E7BCB5BA7055C095987829DD2243409E5C5320B37055C0D1217024D0224340BE30992A187055C05BB22AC24D2243401D007157AF6F55C0BCE82B483322434019035712AB6F55C032E260A63422434016D59AE5AA6F55C055ECB5B434224340F2E473396E6F55C02E66E32448224340CF807A336A6F55C0ECDADE6E49224340B239B8E1E16E55C07ACCA7C7CC22434080128AE4BD6D55C06D1F311EE6234340B1FE69E3A06D55C02017781002244340CDB0B2B2206D55C04D331F947D244340A7575133196D55C0D20A7DCD8424434023BA8E2A0E6D55C05A8E356F8F2443407BCC8165C26C55C02475B570D82443408C4D22F3826C55C057DA9A921525434035D1E2CBE76B55C0151A0111AB2543408CF4A276BF6B55C0ACFD9DEDD125434032296026536B55C0B44F6F89662643402DDAC441406B55C0ED165F75802643408C2AC3B81B6B55C0B0E1E995B226434092CB7F48BF6A55C007944DB9C2274340066B2807AE6A55C03D812468E8274340A06EA0C03B6A55C0923CD7F7E1284340A4D73769336A55C0B4BFF852F228434049111956F16955C0D0EB4FE273294340C27A26BDDC6955C0AE108208BB294340AC72A1F2AF6955C0F2B4FCC0552A4340DF8BBA69A96955C069451E0E722A43403B4B4CF05C6955C0AE798B41BD2B43404F1377123D6955C060B81B44472C4340169F02603C6955C0156EF9484A2C434037BBBB9C1B6955C0B04751E71A2D434009FD25F1096955C0C6F46F6B8B2D4340AE423AC9006955C0C2F673B8C52D43402EABB019E06855C0E9B81AD9952E434002E242F2DB6855C0D3B81CB7F02F4340E26E2E55DB6855C06B8288F3233043404E7ADFF8DA6855C0CC086F0F423043403599F1B6D26855C07E703E75AC3043403271AB20066855C0FD6A0E10CC2F43401803EB387E6755C045D26EF4312F43403FDF162CD56655C09B90D618742E434047AB5AD2516655C0EDD5C743DF2D4340A8716F7EC36555C0D47B2AA73D2D43407E8D2441B86555C0DB4FC6F8302D43406C770FD07D6555C02C6002B7EE2C4340CE3637A6276555C0BD6C3B6D8D2C4340B43A3943716455C0DAAB8F87BE2B4340D4B66114046555C05793A7ACA62B4340EDD0B018756555C0D11F9A79722B43404C8A8F4FC86455C0DF4E22C2BF2A43409E211CB3EC6355C02D5915E1262B4340E5797077D66355C0E67283A10E2B4340B35C363AE76255C01B7DCC07042A4340A7069ACFB96155C0B0E1E995B22843409772BED87B6155C080643A747A284340247A19C5726155C03E3BE0BA62284340FA42C879FF6055C001FA7DFFE627434062A1D634EF6055C01FD95C35CF274340B5DE6FB4E35F55C0616EF7729F264340C8957A16845F55C01F46088F36264340CDE7DCED7A5E55C04968CBB91425434002B68311FB5D55C0D1730B5D892443409F724C16F75D55C092205C01852443408C81751C3F5C55C0E48409A3592343401CB0ABC9535A55C019ADA3AA09224340B8CB7EDDE95955C0AE7C96E7C1214340B5FAEAAA405A55C042EA76F6951D4340F04FA912655A55C02FF99FFCDD1B434066800BB2655A55C0DFA293A5D61B4340D39D279EB35A55C0DF6DDE38291843403B6F63B3235B55C00518963FDF124340583A1F9E255B55C0B14F00C5C8124340FFCD8B135F5B55C033130CE71A104340CB6262F3715B55C081B3942C270F4340508BC1C3B45E55C02905DD5ED20C434079008BFCFA5E55C0B7B585E7A50C4340E04A766C046155C0957F2DAF5C0B4340FDBE7FF3E26155C0E7A7380EBC0A4340473B6EF8DD6255C09DF3531C070A4340685A6265346355C0581EA4A7C8094340AA9A20EA3E6355C05665DF15C10943408542041C426355C05D8AABCABE094340AF42CA4FAA6355C04E0D349F73094340C1C58A1A4C6455C06E4DBA2D91094340A696ADF5456555C057CD7344BE094340CD1C925A286655C0616A4B1DE4094340D8614CFA7B6755C0CCB1BCAB1E0A43405DDDB1D8266955C06BEF5355680A434036AAD381AC6A55C0E469F981AB0A4340989F1B9AB26A55C0BF5FCC96AC0A4340E4A08499B66A55C0D787F546AD0A43405F3E59315C6B55C05DC136E2C90A4340C937DBDC986B55C0FE092E56D40A434076A565A4DE6B55C0B189CC5CE00A4340D0967329AE6C55C086191A4F040B43406EC1525DC06C55C093C7D3F2030B434002F1BA7EC16C55C02B6684B7070B434058552FBFD36C55C07D586FD40A0B43400D8B51D7DA6C55C089D2DEE00B0B4340BEC11726536D55C0E97C7896200B43405776C1E09A6D55C060CAC0012D0B4340EA793716146E55C0A6608DB3E90A43408C4AEA04346E55C0853DEDF0D70A4340DD955D30B86F55C0A6B4FE96000A43406E3315E2917255C0035ABA826D0843405D68AED3487455C07F4A95287B074340BFF04A92E77555C0069E7B0F9706434006BAF605F47655C0635DDC4603064340C6A69542207855C02B31CF4A5A054340B2EF8AE07F7855C017821C9430054340573F36C98F7855C0F607CA6DFB044340C49107228B7855C08A75AA7CCF04434005DB8827BB7855C0F2D077B7B20443403FC8B260E27855C08BFB8F4C87044340304AD05FE87855C05680EF366F04434017B9A7AB3B7955C02CEE3F321D044340723106D6717955C0D26F5F07CE0343408AE76C01A17955C0A9BF5E61C1034340F8A75489B27955C0C536A968AC0343408063CF9ECB7955C0A6EF3504C7034340753DD175E17955C0F8DB9E20B10343401DA8531EDD7955C08C2C9963790343409ACC785BE97955C0718C648F50034340E198654F027A55C0069CA56439034340E4B9BE0F077A55C09D2ADF3312034340C2DD59BBED7955C059DAA9B9DC0243409A232BBF0C7A55C00C5BB3959702434005A6D3BA0D7A55C098F90E7EE2024340E6CC76853E7A55C048DDCEBEF20243400AD462F0307A55C0C937DBDC98024340A4DDE8633E7A55C0D6ABC8E88002434081C98D226B7A55C06A4C88B9A40243403C2D3F70957A55C00A815CE2C8014340994528B6827A55C0436FF1F09E01434049BBD1C77C7A55C0FD31AD4D630143403BF9F4D8967A55C085251E503601434031410DDFC27A55C067EF8CB62A014340588CBAD6DE7A55C0DBDAC2F35201434080F10C1AFA7A55C057CF49EF1B014340328E91EC117B55C07A54FCDF110143405F7CD11E2F7B55C0DD3D40F7E5004340D87F9D9B367B55C00FB6D8EDB300434058C51B99477B55C078B306EFAB004340572250FD837B55C09DD5027B4C004340FF959526A57B55C00BD28C45D3FF4240DC9BDF30D17B55C0F30181CEA4FF4240897B2C7DE87B55C05B5CE333D9FF42409A0986730D7C55C08657923CD7FF4240336ABE4A3E7C55C09E78CE1610004340D07AF832517C55C0359886E123004340FC51D4997B7C55C07E54C37E4F0043405CE509849D7C55C09F5912A0A6004340'
        ]);

        $jefferson_county_tax_id = DB::table($this->taxes)->insertGetId([
            'name' => 'Jefferson County Tax',
            'class' => JeffersonCounty::class,
        ]);

        $kentucky_gua_id = DB::table($this->governmental_unit_areas)
            ->where('name', 'Kentucky')
            ->first()
            ->id;

        DB::table($this->tax_areas)->insert([[
            'tax_id' => $jefferson_county_tax_id,
            'home_governmental_unit_area_id' => $jefferson_county_gua_id,
            'work_governmental_unit_area_id' => $jefferson_county_gua_id,
            'based' => TaxArea::BASED_ON_BOTH_LOCATIONS,
        ]]);

        DB::table($this->tax_areas)->insert([[
            'tax_id' => $jefferson_county_tax_id,
            'home_governmental_unit_area_id' => $jefferson_county_gua_id,
            'work_governmental_unit_area_id' => $jefferson_county_gua_id,
            'based' => TaxArea::BASED_ON_WORK_AND_NOT_HOME_LOCATION,
        ]]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $jefferson_county_tax_id = DB::table($this->taxes)
            ->where('class', JeffersonCounty::class)
            ->first()
            ->id;

        DB::table($this->tax_areas)->where('tax_id', $jefferson_county_tax_id)->delete();
        DB::table($this->taxes)->where('name', 'Jefferson County Tax')->delete();
        DB::table($this->governmental_unit_areas)->where('name', 'Jefferson County, KY')->delete();
    }
}
