<?php

namespace Appleton\Taxes\Seeds;

use Appleton\Taxes\Countries\US\Alabama\BearCreekOccupational;
use DB;
use Illuminate\Database\Seeder;

class BearCreekSeeder extends Seeder
{
    public function run()
    {
        $id = DB::table('governmental_unit_areas')->insertGetId([
            'name' => 'Bear Creek, AL',
            'area' => '0106000020E6100000020000000103000000010000000D000000187B2FBE68EB55C01FBB0B9414244140187B2FBE68EB55C0D672672618244140E8F692C668EB55C0B48F15FC36244140006DAB5967EB55C006B64AB038244140227024D060EB55C0D782DE1B432441406FD6E07D55EB55C090DC9A745B2441403674B33F50EB55C072E0D5726724414056B8E52329EB55C00D1B65FD66244140B43BA41820EB55C013640454382441407079AC1919EB55C007EA944737244140F10C1AFA27EB55C098D9E731CA23414047E5266A69EB55C084D21742CE234140187B2FBE68EB55C01FBB0B9414244140010300000002000000C300000061A8C30AB7F055C00DDC813AE51F414019FCFD62B6F055C0605969520A204140E9B5D95889EF55C0D1CC936B0A204140D6C22CB473EF55C06C0723F609204140D6C22CB473EF55C0B741EDB776204140D6C22CB473EF55C07B4963B48E204140654F029B73EF55C01268B0A9F32041402A1DACFF73EF55C05F3E59315C214140A167B3EA73EF55C022DE3AFF76214140D6C22CB473EF55C03EE603029D214140F6B3588AE4EE55C0C8B5A1629C21414022179CC1DFEE55C0768714032422414011FA997ADDEE55C0A48CB800342241405839B4C876EF55C098DEFE5C34224140A019C40776EF55C02AA8A8FA95224140766C04E275EF55C00E315EF3AA224140EDB60BCD75EF55C0EBABAB02B5224140E544BB0A29EF55C08BA37213B5224140234BE658DEEE55C02C9B3924B5224140DF6E490ED8EE55C08BA37213B52241402C0C91D3D7EE55C0E8F692C668234140BB9866BAD7EE55C045F295404A244140798F334DD8EE55C062855B3E922441404A0B9755D8EE55C066DAFE95952441404434BA83D8EE55C00E48C2BE9D244140B1BD16F4DEEE55C0A757CA32C4254140DA1CE736E1EE55C0D5E6FF5547264140616A4B1DE4EE55C0BAF3C473B6264140A7CAF78C44EE55C01E51A1BAB9264140AA7D3A1E33EE55C0F4893C49BA264140BB40498105EE55C0D07F0F5EBB26414027BA2EFCE0ED55C02897C62FBC264140A777F17EDCED55C0990AF148BC264140F6949C137BED55C0E0826C59BE2641409C6D6E4C4FED55C03E575BB1BF264140C40776FC17ED55C0976E1283C02641409CFA40F2CEEC55C079211D1EC226414075C6F7C5A5EC55C072309B00C3264140CCB051D66FEC55C08A58C4B0C326414065FB90B75CEC55C00D37E0F3C32641401B2B31CF4AEC55C0FBCBEEC9C32641408ACBF10A44EC55C0077AA86DC32641400EDB166536EC55C061C5A9D6C2264140A8E15B5837EC55C0F2CB608C48264140EF8D210038EC55C0E7FA3E1C24264140B9FE5D9F39EC55C0850662D9CC254140BD6DA6423CEC55C06D19709692254140519D0E643DEC55C02AA6D24F38254140C210397D3DEC55C0BB7D569929254140D47B2AA73DEC55C054E23AC6152541404A44F81741EC55C0AAD5575705244140492A53CC41EC55C09D62D520CC234140D5AF743E3CEC55C0863AAC70CB234140503239B533EC55C0D9942BBCCB2341405DFA97A432EC55C0EBFF1CE6CB234140DC9DB5DB2EEC55C0B58AFED0CC234140A77686A92DEC55C07958A835CD234140BB7D569929EC55C0FB027AE1CE234140AA7AF99D26EC55C00C3A2174D023414081E7DEC325EC55C0E272BC02D1234140E78C28ED0DEC55C04BAAB69BE0234140ADA23F34F3EB55C0EFAB72A1F22341404351A04FE4EB55C0FCAA5CA8FC23414019390B7BDAEB55C0635DDC460324414093399677D5EB55C0382EE3A606244140B4705985CDEB55C04DBA2D910B24414024456458C5EB55C075E5B33C0F24414008C556D0B4EB55C00D501A6A14244140E7A4F78DAFEB55C09BA8A5B915244140EA5A7B9FAAEB55C0DC63E943172441408A389D64ABEB55C0BDA8DDAF02244140D5777E5182EB55C060C8EA56CF23414047E5266A69EB55C084D21742CE23414082FDD7B969EB55C01E4E603AAD2341400E6954E064EB55C072DC291DAC234140E066F16261EB55C091291F82AA234140A6B6D4415EEB55C0AAED26F8A6234140859675FF58EB55C0CFDA6D179A234140F73DEAAF57EB55C037A4518193234140B54E5C8E57EB55C0643BDF4F8D234140143DF03158EB55C08BE1EA0088234140E36A64575AEB55C01BB96E4A7923414054AA44D95BEB55C0F5F57CCD7223414082E0F1ED5DEB55C086527B116D2341404560AC6F60EB55C04242942F682341400D1B65FD66EB55C0B2648EE55D234140D09A1F7F69EB55C0CC5CE0F25823414093347F4C6BEB55C0CEF8BEB8542341400F0874266DEB55C03D7FDAA84E234140978922A46EEB55C086C77E164B2341403733FAD170EB55C0E046CA164923414035B1C05774EB55C0872F1345482341409337C0CC77EB55C05322895E46234140D6DF12807FEB55C00F46EC134023414063B6645584EB55C078431A1538234140A33D5E4887EB55C094A3005130234140BA4BE2AC88EB55C0D862B7CF2A234140376DC66988EB55C00A83328D26234140A8FA95CE87EB55C011A8FE4124234140F1F44A5986EB55C01EBE4C1421234140AA622AFD84EB55C09E7B0F971C234140A5D93C0E83EB55C07D7555A0162341404CC2853C82EB55C0CC7A319413234140E12538F581EB55C0F7A92A341023414057EBC4E578EB55C02D944C4EED2241402446CF2D74EB55C078279F1EDB2241402710768A55EB55C020274C18CD224140F623456458EB55C063B2B8FFC8224140ADC1FBAA5CEB55C0A2B437F8C2224140172AFF5A5EEB55C008E23C9CC0224140B29B19FD68EB55C0DA740470B3224140102219726CEB55C0170FEF39B02241400795B88E71EB55C06BD102B4AD224140E122F77475EB55C089EAAD81AD22414026FF93BF7BEB55C0297AE063B022414097C3EE3B86EB55C0FBAE08FEB72241404A5D328E91EB55C04548DDCEBE2241409E2287889BEB55C03462669FC72241406D533C2EAAEB55C039D4EFC2D62241407E8AE3C0ABEB55C0D3DA34B6D72241401CCC26C0B0EB55C056B950F9D72241407213B534B7EB55C01A87FA5DD8224140494563EDEFEB55C0AD68739CDB2241400708E6E8F1EB55C0F54883DBDA22414089981249F4EB55C048A30227DB2241400DF96706F1EB55C0C8B1F50CE12241400F61FC34EEEB55C049F4328AE5224140ED26F8A6E9EB55C0997E8978EB2241405019FF3EE3EB55C0AED689CBF1224140865451BCCAEB55C082902C6002234140C5707500C4EB55C0CC5D4BC807234140971DE21FB6EB55C0EEE87FB916234140649291B3B0EB55C0FC4FFEEE1D2341407E703E75ACEB55C02313F06B24234140800C1D3BA8EB55C03046240A2D23414004392861A6EB55C087C1FC15322341402AABE97AA2EB55C08B338639412341402ADF3312A1EB55C0DD76A1B94E234140603AADDBA0EB55C0D381ACA756234140185A9D9CA1EB55C0691CEA7761234140C8EC2C7AA7EB55C0EED0B01875234140ADF4DA6CACEB55C06C770FD07D2341405A66118AADEB55C07100FDBE7F234140C24CDBBFB2EB55C09D8026C2862341404DA1F31ABBEB55C045BA9F53902341401FD61BB5C2EB55C05FCFD72C9723414098A59D9ACBEB55C0A3AB74779D234140B9DFA128D0EB55C079B0C56E9F234140D442C9E4D4EB55C09C86A8C29F2341403317B83CD6EB55C05B971AA19F23414097361C9606EC55C0B9162D40DB2241404205871744EC55C096404AECDA224140CBD4247843EC55C03F34F3E49A224140CBBA7F2C44EC55C0C5008926502241407D1D386744EC55C0B8019F1F46224140183E22A644EC55C01D8D43FD2E2241405FEAE74D45EC55C0309B00C3F2214140EE76BD3445EC55C0C91CCBBBEA21414000E2AE5E45EC55C02B6B9BE27121414006B98B3045EC55C047C66AF3FF20414065C1C41F45EC55C0601C5C3AE6204140DC0BCC0A45EC55C0A0698995D12041404D7FF62345EC55C01F7F69519F20414000FC53AA44EC55C0682096CD1C2041407E37DDB243EC55C0B6A0F7C610204140F86EF3C649EC55C0D4B9A29410204140529CA38E8EEC55C05EBD8A8C0E2041407C9752978CEC55C0C343183F8D1F4140E27668588CEC55C03DB9A640661F41406A2C616D8CEC55C0F31FD26F5F1F41405F05F86EF3EB55C01FA16648151F4140D1782288F3EB55C00A4966F50E1F4140A1F48590F3EB55C05A9C31CC091E41409929ADBF25EC55C0E33785950A1E4140068195438BEC55C01E6ADB300A1E4140B0FD648C0FED55C0CB0F5CE5091E4140BBD408FD4CED55C078B5DC99091E4140A1F5F065A2ED55C036C64E78091E414038F1D58EE2ED55C072F8A413091E414044F6419605EE55C0608DB3E9081E4140E561A1D634EE55C01F9E25C8081E41402688BA0F40EE55C08463963D091E4140FDF7E0B54BEE55C0310917F2081E414059677C5F5CEE55C08A20CEC3091E4140EAB298D87CEE55C0483140A2091E4140630795B88EEE55C078B5DC99091E41407FA4880CABEE55C054DFF945091E4140ED2FBB270FEF55C001857AFA081E4140ABCABE2B82EF55C0CC43A67C081E41402040868E1DF055C0258FA7E5071E4140FCFCF7E0B5F055C04F560C57071E4140CC5EB69DB6F055C0FDF33460901E41409CDA19A6B6F055C0419C8713981E41407EC16ED8B6F055C080ED60C43E1F414061A8C30AB7F055C00DDC813AE51F414009000000F23D23111AED55C034A0DE8C9A1F4140CB29013109ED55C02F17F19D981F4140F57F0EF3E5EC55C0C47762D68B1F41408AC91B60E6EC55C077137CD3F41F4140137F1475E6EC55C0DEE2E13D07204140F23D23111AED55C0DEE2E13D07204140F23D23111AED55C0527E52EDD31F4140F23D23111AED55C0535BEA20AF1F4140F23D23111AED55C034A0DE8C9A1F4140',
        ]);

        DB::table('tax_areas')->insert([
            'name' => 'Bear Creek Occupational Tax',
            'tax' => BearCreekOccupational::class,
            'governmental_unit_area_id' => $id,
        ]);
    }
}