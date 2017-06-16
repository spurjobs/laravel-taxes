<?php

namespace Appleton\Taxes\Seeds\US\Alabama;

use Appleton\Taxes\Countries\US\Alabama\FairfieldOccupational;
use DB;
use Illuminate\Database\Seeder;

class FairfieldSeeder extends Seeder
{
    public function run()
    {
        $id = DB::table('governmental_unit_areas')->insertGetId([
            'name' => 'Fairfield, AL',
            'area' => '0106000020E61000000100000001030000000100000044010000D5E6FF5547BC55C0793F6EBF7CBA4040B728B34126BC55C0AFB48CD47BBA4040118E59F624BC55C0C6DCB5847CBA40408EC9E2FE23BC55C0780B24287EBA4040CFB8702024BC55C0BFB7E9CF7EBA40400F98874CF9BB55C0E716BA1281BA4040B6662B2FF9BB55C05A0F5F268ABA4040C8D11C59F9BB55C0F8872D3D9ABA40408A1A4CC3F0BB55C05890662C9ABA4040DFC2BAF1EEBB55C0B7989F1B9ABA404038F4160FEFBB55C03C6A4C88B9BA40403D7D04FEF0BB55C03C6A4C88B9BA4040B54C86E3F9BB55C06BEEE87FB9BA4040B54C86E3F9BB55C0A6ECF483BABA404041B8020AF5BB55C0A6ECF483BABA4040E886A6ECF4BB55C0CB13083BC5BA4040745DF8C1F9BB55C02A1C412AC5BA40408C9FC6BDF9BB55C01D3A3DEFC6BA40409E0AB8E7F9BB55C05DDE1CAED5BA404086C8E9EBF9BB55C0F6B0170AD8BA4040EFDFBC38F1BB55C0D3DA34B6D7BA404027A3CA30EEBB55C062670A9DD7BA4040DFDC5F3DEEBB55C0F818AC38D5BA4040A794D74AE8BB55C0289D4830D5BA40400BEF7211DFBB55C0344B02D4D4BA40400C3D62F4DCBB55C022E010AAD4BA40407C96E7C1DDBB55C006280D350ABB40400B5D8940F5BB55C07D586FD40ABB4040506D7022FABB55C0BF47FDF50ABB4040175FB4C70BBC55C0240D6E6B0BBB4040AC8E1CE90CBC55C0F488D1730BBB40404B1E4FCB0FBC55C065FCFB8C0BBB4040A4A31CCC26BC55C0DC2C5E2C0CBB40407B1002F225BC55C091B6F1272ABB404087BEBB9525BC55C0CFF23CB83BBB4040EDB776A224BC55C029B2D6506ABB4040931B45D61ABC55C097A608707ABB404005DD5ED218BC55C0CB7F48BF7DBB4040D0B2EE1F0BBC55C0EFC3414294BB40403D29931ADABB55C0431EC18D94BB40409D6516A1D8BB55C0FB592C45F2BB404061DF4E22C2BB55C07A8B87F71CBC4040C3802557B1BB55C05BD07B6308BC4040BE11DDB3AEBB55C093FE5E0A0FBC4040718E3A3AAEBB55C0B0E3BF4010BC4040EBA86A82A8BB55C062635E471CBC4040CD58349D9DBB55C0E945ED7E15BC4040096B63EC84BB55C062F5471806BC4040EC8502B683BB55C0560DC2DCEEBB4040C8AF1F6283BB55C048A643A7E7BB4040D0EE906280BB55C001C0B167CFBB4040AD4CF8A57EBB55C008C89750C1BB404060E3FA777DBB55C03DB83B6BB7BB4040E947C32973BB55C00914B18861BB404029AC545051BB55C050AA7D3A1EBB40400DA7CCCD37BB55C0643DB5FAEABA4040DFA4695034BB55C06E4F90D8EEBA40408204C58F31BB55C0C0417BF5F1BA404045D8F0F44ABB55C08255F5F23BBB40408735954561BB55C0882EA86F99BB4040A855F48766BB55C0649291B3B0BB4040C1FF56B263BB55C01004C8D0B1BB4040FF04172B6ABB55C01C60E63BF8BB4040C7F319506FBB55C0A75CE15D2EBC4040DF35E84B6FBB55C012876C205DBC4040DF35E84B6FBB55C00C5531957EBC4040AFB14B546FBB55C0EF004F5AB8BC40409D465A2A6FBB55C03E23111AC1BC4040751E15FF77BB55C0A4FFE55AB4BC4040AFB48CD47BBB55C0B4E55C8AABBC40403D0D18247DBB55C050888043A8BC4040E716BA1281BB55C09DA04D0E9FBC4040689082A790BB55C0C5A86BED7DBC4040C90391459ABB55C0EC3191D26CBC4040FA60191BBABB55C0BD1C76DF31BC4040E8667FA0DCBB55C074266DAAEEBB4040E15B5837DEBB55C05B96AFCBF0BB4040306475ABE7BB55C01E19ABCDFFBB404041B5C189E8BB55C01DE5603601BC4040DFF60489EDBB55C013F06B2409BC4040990D32C9C8BB55C09E094D124BBC4040EE0390DAC4BB55C0DC0BCC0A45BC4040C556D0B4C4BB55C02AA913D044BC40405455682096BB55C05890662C9ABC4040CA17B49080BB55C03E23111AC1BC4040E3DBBB067DBB55C05EF58079C8BC40403DF0315871BB55C0B2F1608BDDBC40400EBA84436FBB55C09BC937DBDCBC40400C93A98251BB55C07920B24813BD4040575D876A4ABB55C09622F94A20BD4040349BC76130BB55C09B53C90050BD40404754A86E2EBB55C040A0336953BD4040A7902BF52CBB55C009C3802557BD40409D82FC6CE4BA55C0A5D8D138D4BD404094D8B5BDDDBA55C004FEF0F3DFBD40407250C24CDBBA55C0A359D93EE4BD40409CFA40F2CEBA55C09E0AB8E7F9BD404039D1AE42CABA55C00589EDEE01BE4040DB300A82C7BA55C02C9D0FCF12BE404018B14F00C5BA55C0F374AE2825BE40402A36E675C4BA55C0FC523F6F2ABE4040300DC347C4BA55C0F52D73BA2CBE4040B439CE6DC2BA55C00DC4B29943BE4040FD4D2844C0BA55C02CB98AC56FBE4040EC1681B1BEBA55C08EE89E758DBE4040DADFD91EBDBA55C0A6CF0EB8AEBE4040E78D93C2BCBA55C0E5EE737CB4BE4040D522A298BCBA55C0EA77616BB6BE40406F0F4240BEBA55C079211D1EC2BE40401342075DC2BA55C0AEB9A3FFE5BE40402D060FD3BEBA55C01EBE4C1421BF40408333F8FBC5BA55C074D190F128BF4040751DAA29C9BA55C06F6589CE32BF4040D9AED007CBBA55C0DE3CD52137BF4040D2890453CDBA55C04CC3F01131BF404080B4FF01D6BA55C0637D03931BBF404025E7C41EDABA55C0B41EBE4C14BF4040D5AD9E93DEBA55C03F56F0DB10BF4040DE8B2FDAE3BA55C04B38F4160FBF404018080264E8BA55C0A583F57F0EBF4040632310AFEBBA55C08179C8940FBF4040AB0320EEEABA55C0D7868A71FEBE40402EFCE07CEABA55C0FB05BB61DBBE4040AB0320EEEABA55C0B6D8EDB3CABE4040569BFF571DBB55C0DA6FED4449BE4040FA415DA450BB55C029CE5147C7BD4040ADA415DF50BB55C0C87A6AF5D5BD4040309DD66D50BB55C076DF313CF6BD40400E2F88484DBB55C080B4FF01D6BE4040F584251E50BB55C049111956F1BE40407B849A2155BB55C0A6B73F170DBF4040774CDD955DBB55C0A3552DE928BF4040DF18028063BB55C01EF818AC38BF40401A4B581B63BB55C0A06EA0C03BBF40402B31CF4A5ABB55C09B19FD6838BF404028F1B913ECBA55C089230F4416BF40400C5A48C0E8BA55C04E25034015BF4040A23F34F3E4BA55C07EA99F3715BF40401C40BFEFDFBA55C0D0CFD4EB16BF4040B325AB22DCBA55C0161406651ABF40404FC8CEDBD8BA55C0669E5C5320BF4040301004C8D0BA55C0CD39782634BF404068075C57CCBA55C0B341261939BF4040FF3A376DC6BA55C0FB21365838BF4040E50B5A48C0BA55C0E9B6442E38BF4040FCFCF7E0B5BA55C0DD088B8A38BF404097E0D40792BA55C03D61890794BF4040B33D7AC37DBA55C0B85A272EC7BF4040990E9D9E77BA55C04B598638D6BF404016139B8F6BBA55C017D7F84CF6BF40403830B95164BA55C0323D618907C0404035EF384547BA55C09602D2FE07C040401ADA006C40BA55C0E8A38CB800C040402BC0779B37BA55C057923CD7F7BF4040FF59F3E32FBA55C00F61FC34EEBF4040639AE95E27BA55C0FC709010E5BF4040DE1CAED51EBA55C0C5AA4198DBBF4040E3A25A4414BA55C0895B0531D0BF4040D07EA4880CBA55C03A394371C7BF4040CEF9298E03BA55C01021AE9CBDBF4040E789E76C01BA55C0355F251FBBBF404006D7DCD1FFB955C01A16A3AEB5BF40404F1F813FFCB955C02C8194D8B5BF40409E0AB8E7F9B955C078EA9106B7BF4040F9BA0CFFE9B955C0255CC823B8BF40402368CC24EAB955C03E20D099B4BF4040CFF3A78DEAB955C065C6DB4AAFBF404058C345EEE9B955C07FBE2D58AABF40407CB3CD8DE9B955C06745D4449FBF4040A0A3552DE9B955C014B1886187BF4040BEBC00FBE8B955C0637C98BD6CBF4040BEBC00FBE8B955C0492D944C4EBF4040D6FECEF6E8B955C0F834272F32BF40403621AD31E8B955C03CA3AD4A22BF404018080264E8B955C09A3DD00A0CBF4040BEBC00FBE8B955C02C2CB81FF0BE4040E292E34EE9B955C0F8359204E1BE4040E74F1BD5E9B955C04F3DD2E0B6BE4040F3FDD478E9B955C0E605D847A7BE4040C4793881E9B955C08E39CFD897BE4040DCBB067DE9B955C053EA92718CBE404094F59B89E9B955C0C0081A3389BE40405E9A22C0E9B955C050E09D7C7ABE4040E74F1BD5E9B955C05ED905836BBE404052EC681CEAB955C09B560A815CBE4040AC1DC539EAB955C05BB22AC24DBE40401D91EF52EAB955C02D793C2D3FBE40401C774A07EBB955C0BF7E880D16BE40408DEA7420EBB955C0B6A0F7C610BE404016A06D35EBB955C06A9F8EC70CBE40408C9C853DEDB955C04D124BCADDBD4040516A2FA2EDB955C0F38C7DC9C6BD404068ACFD9DEDB955C0BDC62E51BDBD4040BC067DE9EDB955C0A7CCCD37A2BD404027A3CA30EEB955C0670B08AD87BD40407AFD497CEEB955C0637C98BD6CBD40409DD32CD0EEB955C071581AF851BD40409DD32CD0EEB955C0D1949D7E50BD4040CD57C9C7EEB955C0EA07759142BD4040AF3E1EFAEEB955C0A0A2EA573ABD4040B615FBCBEEB955C0EDBAB72231BD4040F70489EDEEB955C0E86514CB2DBD4040C18F6AD8EFB955C025CCB4FD2BBD404050508A56EEB955C0176536C824BD40405A457F68E6B955C06B0A647616BD4040B376DB85E6B955C0137F1475E6BC4040CBB8A981E6B955C0C16F438CD7BC4040E3FA777DE6B955C040DCD5ABC8BC4040E3FA777DE6B955C06A865451BCBC4040137F1475E6B955C04759BF9998BC4040BA4DB857E6B955C0CB82893F8ABC40401956F146E6B955C02FF7C95180BC4040F98381E7DEB955C0E7C589AF76BC4040CD3AE3FBE2B955C0681F2BF86DBC404073EFE192E3B955C07BBE66B96CBC40404D637B2DE8B955C02DD0EE9062BC40409ACFB9DBF5B955C0DC0BCC0A45BC4040CEA8F92AF9B955C09F20B1DD3DBC40403BC43F6CE9B955C03FAA61BF27BC404004013274ECB955C0E962D34A21BC404023B9FC87F4B955C05D8940F50FBC404010E6762FF7B955C0605969520ABC4040355B79C9FFB955C068C9E369F9BB404098840B7904BA55C0C64CA25EF0BB4040427A8A1C22BA55C0FE2955A2ECBB4040CFBBB1A030BA55C06A1492CCEABB4040402FDCB930BA55C01956F146E6BB40401DC70F9546BA55C0A7069ACFB9BB404055D80C7041BA55C0B1FB8EE1B1BB404095287B4B39BA55C0CFF753E3A5BB4040A33EC91D36BA55C06CCEC133A1BB404004E3E0D231BA55C0404E98309ABB40403620425C39BA55C047567E198CBB4040F3E2C4573BBA55C09C4CDC2A88BB40408272DBBE47BA55C08BA71E6970BB4040A27895B54DBA55C0F04FA91265BB4040DDB06D5166BA55C00B992B836ABB4040C90050C58DBA55C0BF29AC5450BB40403A8E1F2A8DBA55C00585419946BB40409A9658198DBA55C0D6E3BED53ABB4040C90050C58DBA55C0F3AB394030BB404003CB113290BA55C0E38BF67821BB4040A2409FC893BA55C037FDD98F14BB40401F48DE3994BA55C0E63E390A10BB4040D5CBEF3499BA55C0B5696CAF05BB40405628D2FD9CBA55C05F22DE3AFFBA4040FA298E03AFBA55C0AEB9A3FFE5BA4040A4198BA6B3BA55C082397AFCDEBA4040CADC7C23BABA55C0DF88EE59D7BA404067244223D8BA55C07E703E75ACBA404038D73043E3BA55C074417DCB9CBA4040CC069964E4BA55C0221B48179BBA40404BADF71BEDBA55C0109370218FBA404079E3A430EFBA55C05F984C158CBA40403D635FB2F1BA55C0249A40118BBA4040A1F48590F3BA55C066BD18CA89BA4040239F573CF5BA55C0C6F99B5088BA4040A54929E8F6BA55C08081204086BA404069E388B5F8BA55C0753BFBCA83BA40403ACAC16C02BB55C09A5C8C8175BA404069006F8104BB55C042791F4773BA40407A51BB5F05BB55C078EE3D5C72BA4040D21A834E08BB55C0A3E9EC6470BA404023F3C81F0CBB55C06EDC627E6EBA4040B9C1508715BB55C0ED65DB696BBA40403B527DE717BB55C0A5B915C26ABA4040F8FA5A971ABB55C088D4B48B69BA4040499F56D11FBB55C02577D84466BA40409B9141EE22BB55C0BB287AE063BA4040176536C824BB55C0B69F8CF161BA40400C3CF71E2EBB55C00A9C6C0377BA404005172B6A30BB55C0F660527C7CBA4040E90AB6114FBB55C06EF9484A7ABA4040BC5983F755BB55C098C0ADBB79BA4040B7D0950854BB55C069705B5B78BA40404ED026874FBB55C0A5A2B1F677BA404031D120054FBB55C0A5A2B1F677BA4040618907944DBB55C0342F87DD77BA40402DCA6C9049BB55C088D4B48B69BA4040CD8DE9094BBB55C05950189469BA40409C6D6E4C4FBB55C0F947DFA469BA4040A5B915C26ABB55C0A0FCDD3B6ABA4040EDD0B01875BB55C0CAC342AD69BA40409772BED87BBB55C05984622B68BA4040868C47A984BB55C0F4BEF1B567BA4040AC3594DA8BBB55C0C53A55BE67BA4040C343183F8DBB55C08FC536A968BA4040069E7B0F97BB55C06362F3716DBA40405912A0A696BB55C035B56CAD2FBA40405455682096BB55C00FB8AE9811BA4040CBB9145795BB55C00B46257502BA40401971016894BB55C0D78349F1F1B940401ABFF04A92BB55C02E8B89CDC7B940409109F83592BB55C08BA6B393C1B9404024EB707495BB55C01A33897AC1B940401A6D5512D9BB55C0C70C54C6BFB94040A8C5E061DABB55C0B88E71C5C5B9404042B28009DCBB55C08CF7E3F6CBB94040D00A0C59DDBB55C05AD76839D0B940401669E21DE0BB55C015E46723D7B94040EB39E97DE3BB55C09AAF928FDDB9404072A1F2AFE5BB55C0B760A92EE0B940409ACC785BE9BB55C04451A04FE4B940405184D4EDECBB55C066BFEE74E7B94040F70489EDEEBB55C0F4177AC4E8B940409546CCECF3BB55C0CFD90242EBB94040336E6AA0F9BB55C0E010AAD4ECB94040F303577902BC55C0F70489EDEEB940408A54185B08BC55C0A2427573F1B940403B4F3C670BBC55C0592E1B9DF3B94040DA907F6610BC55C0D47FD6FCF8B940402C9D0FCF12BC55C020B58993FBB940404DBD6E1118BC55C06FD74B5304BA40404698A25C1ABC55C096CE876709BA40408C2AC3B81BBC55C0355EBA490CBA4040ACC8E88024BC55C042AED4B320BA404087BEBB9525BC55C06B0DA5F622BA40409204E10A28BC55C0D2E28C614EBA4040613596B036BC55C0016729594EBA4040884677103BBC55C0B4E6C75F5ABA4040AED51EF642BC55C0F450DB8651BA40407DE9EDCF45BC55C0016729594EBA40400AF4893C49BC55C0BA2EFCE07CBA4040D5E6FF5547BC55C0793F6EBF7CBA4040',
        ]);

        DB::table('tax_areas')->insert([
            'name' => 'Fairfield Occupational Tax',
            'tax' => FairfieldOccupational::class,
            'governmental_unit_area_id' => $id,
        ]);
    }
}