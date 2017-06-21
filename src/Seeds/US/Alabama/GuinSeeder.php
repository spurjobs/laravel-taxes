<?php

namespace Appleton\Taxes\Seeds\US\Alabama;

use Appleton\Taxes\Countries\US\Alabama\GuinOccupational;
use DB;
use Illuminate\Database\Seeder;

class GuinSeeder extends Seeder
{
    public function run()
    {
        if (DB::table(config('taxes.governmental_unit_areas'))->where('name', 'Guin, AL')->exists()) return;

        $id = DB::table(config('taxes.governmental_unit_areas'))->insertGetId([
            'name' => 'Guin, AL',
            'area' => '0106000020E610000003000000010300000001000000430000008AADA06989F655C0D76B7A5050004140D3872EA86FF655C0E0A0BDFA7800414009DD257156F655C0F8A41309A60041402F698CD651F655C0705AF0A2AF0041406A16687748F655C06682E15CC3004140A1F31ABB44F655C0A2D11DC4CE0041401F49490F43F655C09944BDE0D3004140D0EFFB372FF655C0D044D8F0F40041401AA034D428F655C02E36AD1402014140834C327216F655C0D9CA4BFE2701414012859675FFF555C019A9F7544E01414013D38558FDF555C093FAB2B4530141405036E50AEFF555C0C1E270E657014140008FA850DDF555C047E2E5E95C014140FD84B35BCBF555C051C07630620141406C59BE2EC3F555C09DF529C76401414061DF4E22C2F555C0A5315A475501414016A4198BA6F555C0FE99417C600141400FB3976DA7F555C050A912656F014140B7B585E7A5F555C0C6D9740470014140AED7F4A0A0F555C054FEB5BC72014140B491EBA694F555C098DA52077901414048BE124889F555C095D6DF1280014140E97E4E417EF555C0D2C1FA3F8701414034492C2977F555C000AAB8718B0141406D8E739B70F555C0B07092E68F0141403412A1116CF555C0A8177C9A93014140E21FB6F468F555C0600322C495014140EF01BA2F67F555C08F53742497014140E2E82ADD5DF555C0E3F8A1D2880141402D76FBAC32F555C0FF93BF7B470141406B5ED5592DF555C0E5B2D1393F014140A489778027F555C0E42D573F36014140E7C072840CF555C0AB74779D0D0141401B7DCC0704F555C0A69A594B010141401990BDDEFDF455C009DB4FC6F8004140630CACE3F8F455C0D1AC6C1FF200414066F6798CF2F455C09AB2D30FEA00414023827170E9F455C0349C3237DF004140E3FA777DE6F455C0D13E56F0DB0041408C683BA6EEF455C0E3A9471ADC004140376E313F37F555C0C45C52B5DD0041408F519E7939F555C04BC79C67ECFF40401F2BF86D88F555C04CFBE6FEEAFF4040D2A57F492AF655C006B7B585E7FF404013471E882CF655C0ED26F8A6E9FF4040DC9DB5DB2EF655C0DB87BCE5EAFF40408DB27E3331F655C0C91CCBBBEAFF4040868DB27E33F655C06B48DC63E9FF404055BB26A435F655C006B7B585E7FF40401230BABC39F655C056F0DB10E3FF4040D6E3BED53AF655C06E4C4F58E2FF4040CFBEF2203DF655C0334E4354E1FF40401B28F04E3EF655C0F25EB532E1FF40406891ED7C3FF655C063D2DF4BE1FF4040A25BAFE941F655C0CE548847E2FF404007077B1343F655C0F7E7A221E3FF40403BE0BA6246F655C06CB07092E6FF40409F71E14048F655C041B5C189E8FF40407FA2B2614DF655C050508A56EEFF404080272D5C56F655C0A25F5B3FFDFF4040115322895EF655C082C7B7770D004140D1E80E6267F655C0E5417A8A1C00414067B796C970F655C0137B681F2B004140F7AE415F7AF655C0EE59D76839004140FEF0F3DF83F655C0ED0E2906480041408AADA06989F655C0D76B7A5050004140010300000001000000080000005BECF65965F955C0E3C3EC65DB034140BC3D0801F9F855C03CDBA337DC034140E5EAC726F9F855C0F5F411F8C30341406FBA6587F8F855C00E80B8AB57034140ECC1A4F8F8F855C0D2FC31AD4D0341408A1C226E4EF955C02B14E97E4E034140F04FA91265F955C0DD76A1B94E0341405BECF65965F955C0E3C3EC65DB034140010300000002000000620100001E6CB1DB67FC55C0CC237F30F0024140247B849A21FC55C001310917F2024140B45549641FFC55C090BDDEFDF102414049D3A0681EFC55C0FE43FAEDEB024140C29FE1CD1AFC55C09D6516A1D8024140354415FE0CFC55C0895FB1868B024140E5EB32FCA7FB55C0A7C98CB7950241402C4487C091FB55C04D4A41B797024140B07092E68FFB55C03FC7478B330241403BFBCA83F4FB55C0691A14CD0302414085268925E5FB55C0D218ADA3AA0141409A95ED43DEFB55C015E5D2F885014140D6FB8D76DCFB55C0D8614CFA7B01414067F0F78BD9FB55C0B019E0826C014140C9AEB48CD4FB55C05930F14751014140E3C0ABE5CEFB55C0CA4C69FD2D01414078245E9ECEFB55C0E3DC26DC2B0141405DA45016BEFB55C08DCF64FF3C01414012A3E716BAFB55C0A94C31074101414055F7C8E6AAFB55C0DD425722500141401D925A2899FB55C0ECFA05BB6101414069C4CC3E8FFB55C0AFCF9CF529014140BEDA519CA3FB55C06249B9FB1C014140EA3D95D39EFB55C009A7052FFA0041403ECC5EB69DFB55C01F4AB4E4F1004140E2E7BF07AFFB55C0D6187442E80041407077D66EBBFB55C0BC033C69E100414074B2D47ABFFB55C05053CBD6FA004140D238D4EFC2FB55C0691D554D1001414004AA7F10C9FB55C093E4B9BE0F014140CE4E0647C9FB55C033DC80CF0F014140EDB5A0F7C6FB55C0520C9068020141401EA2D11DC4FB55C02BF86D88F1004140BB44F5D6C0FB55C09A95ED43DE00414098BC0166BEFB55C0B891B245D2004140CAA5F10BAFFB55C0A5F3E15982004140CD72D9E89CFB55C056815A0C1E004140C2F869DC9BFB55C01D53776517004140AEEE586C93FB55C04E97C5C4E6FF4040B48EAA2688FB55C0EBA86A82A8FF404000732D5A80FB55C02D41464085FF404095D6DF1280FB55C0F0A65B7688FF404030116F9D7FFB55C00E4B033FAAFF404066A032FE7DFB55C0CE87670932004140724EECA17DFB55C02713B70A62004140963E74417DFB55C0AD86C43D96004140E0B721C66BFB55C0069E7B0F97004140166BB8C83DFB55C0C937DBDC980041401ABD1AA034FB55C0354580D3BB00414018D00B772EFB55C0C30B2252D3004140A6EF3504C7FA55C0374F75C8CD004140FE0DDAAB8FFA55C0DF6B088ECB0041402C2AE27492FA55C078D1579066004140F7216FB9FAF955C0D671FC5069004140AE27BA2EFCF955C03C1570CFF3FF4040C4E9245B5DFA55C02DAEF199ECFF4040707500C45DFA55C05187156EF9FE404097FE25A94CFA55C0DA56B3CEF8FE40409DD66D50FBF955C0295C8FC2F5FE4040D908C4EBFAF955C0A320787C7BFF4040538F34B8ADF955C056B77A4E7AFF40401D1A16A3AEF955C0E0B9F770C9FF404041D653ABAFF955C00EDAAB8F8700414013D55B035BF955C0516518778300414043739D465AF955C00AF2B391EB00414089EB18575CF955C09947FE60E00141402023A0C211F955C069C36169E0014140A99ECC3FFAF855C069C36169E00141401A12F758FAF855C0E481C8224D0241406FD575A8A6F855C09E094D124B0241406FD575A8A6F855C0F23FF9BB770241406FD575A8A6F855C04DF2237EC5024140D9740470B3F855C053AF5B04C6024140A99ECC3FFAF855C0A14CA3C9C5024140ECC1A4F8F8F855C0D2FC31AD4D0341405F605628D2F855C04FEACBD24E034140B3EE1F0BD1F855C03E5A9C31CC03414076A22424D2F855C00EF3E505D80341406FD575A8A6F855C06C938AC6DA034140F622DA8EA9F855C026C286A7570441408026C286A7F855C0E82CB308C5044140F199EC9FA7F855C0A12E52280B054140F199EC9FA7F855C03F8A3A730F054140DA571EA4A7F855C0174850FC18054140C21550A8A7F855C012DC48D9220541407A4FE5B4A7F855C0EF90628044054140471CB28174F855C083DA6FED44054140BC5983F755F855C00DDE57E5420541403F389F3A56F855C02FA4C343180541400FCEA78E55F855C0637E6E68CA044140A4315A4755F855C0DE1AD82AC1044140EBA9D55757F855C0AC6F6072A3044140307DAF2138F855C093DFA293A504414004FD851E31F855C057790261A7044140D155BABBCEF755C05E9ECE15A5044140144031B264F755C05CE509849D044140800A47904AF755C0F853E3A59B044140043752B648F755C05B3E92921E04414062F20698F9F655C05B3E92921E04414052D50451F7F655C07C9752978C034140F8A3A833F7F655C0E6C8CA2F83034140D1AC6C1FF2F655C0A7751BD47E03414022FAB5F5D3F655C0FE99417C60034140552E54FEB5F655C0575A46EA3D0341402C8194D8B5F655C04CFDBCA948034140D10149D8B7F655C057EBC4E578034140902C6002B7F655C0FACF9A1F7F0341405A7D7555A0F655C0D0D4EB16810341404A07EBFF1CF655C0B47405DB88034140C26B97361CF655C0BEA4315A4703414075E8F4BC1BF655C0F65E7CD11E034140F8FA5A971AF655C0CE16105A0F034140279F1EDB32F655C0AB74779D0D0341404DD6A88768F655C072DEFFC709034140C420B07268F655C01BF5108DEE024140F4A44C6A68F655C09D82FC6CE4024140E2395B4068F655C0A0C1A6CEA3024140FB592C45F2F655C0D2E1218C9F0241405A48C0E8F2F655C0967A1684F202414042EC4CA1F3F655C078094E7D20034140A7E49CD843F755C04E42E90B21034140E751F17F47F755C09B1E1494A2034140AB24B20FB2F755C00B5EF415A4034140F18288D4B4F755C05B971AA19F034140847EA65EB7F755C0D497A59D9A034140A7069ACFB9F755C0012F336C94034140E09C11A5BDF755C0670B08AD87034140FC3383F8C0F755C0FB03E5B67D034140FF06EDD5C7F755C07C0C569C6A034140AA2A3410CBF755C0FE99417C6003414061307F85CCF755C0662FDB4E5B03414000A60C1CD0F755C077499C15510341405F94A0BFD0F755C090D959F44E034140C425C79DD2F755C07CB5A3384703414022E010AAD4F755C00ABDFE243E034140992A1895D4F755C08F1A13622E034140FE092E56D4F755C0245F09A4C402414064ABCB2901F855C04869368FC302414083328D2617F855C013286211C30241400793E2E313F855C01E32E54350034140D236FE4465F855C04EB6813B500341408B8A389D64F855C068B0A9F3A80241409CDEC5FB71F855C02843554CA5014140654F029B73F855C0D255BABBCE004140654F029B73F855C0AE80423D7D004140BEDA519CA3F855C085ED27637C00414099982EC4EAF855C085ED27637C0041407A1A3048FAF855C04AEF1B5F7B0041404A969350FAF855C0DA53724EECFF4040AC376A85E9F855C0DFDC5F3DEEFF4040C5C4E6E3DAF855C068ACFD9DEDFF404051BCCADAA6F855C0B058C345EEFF40403929CC7B9CF855C021CCED5EEEFF4040564277499CF855C01C774A07EBFF40409817601F9DF855C0C2A1B77878FF4040CE33F6251BF955C0A167B3EA73FF4040B5FAEAAA40F955C001A4367172FF404097E13FDD40F955C0E6AC4F3926FF4040C18EFF0241F955C04413286211FF404090F2936A9FF855C03DD175E107FF404065DEAAEB50F855C0566133C005FF404065DEAAEB50F855C0573F36C98FFE404071581AF851F855C0B648DA8D3EFE4040703E75AC52F855C072A1F2AFE5FD404057E883656CF855C0207BBDFBE3FD4040B37A87DBA1F855C0ABB2EF8AE0FD40400DFAD2DB9FF855C0B585E7A562FD4040CBBC55D7A1F855C02CB7B41A12FD40401DE38A8BA3F855C01936CAFACDFC404051BCCADAA6F855C0B741EDB776FC404072DC291DACF855C0094D124BCAFB4040FFE6C589AFF855C01F8315A75AFB4040D0622992AFF855C0FCE07CEA58FB40409430D3F6AFF855C026DD96C805FB4040A69BC420B0F855C03C122F4FE7FA4040C971A774B0F855C0B0389CF9D5FA4040BDC3EDD0B0F855C05AD427B9C3FA4040F068E388B5F855C0F98381E7DEF940403E062B4EB5F855C0F241CF66D5F94040AAF06778B3F855C0F6EFFACC59F940407686A92D75F955C039984D8061F94040A0DFF76F5EFA55C09FE238F06AF94040B130444E5FFA55C06798DA5207F94040340F60915FFA55C05036E50AEFF84040D50627A25FFA55C0E42EC214E5F84040D4D2DC0A61FA55C0B1C05774EBF74040EDF318E599FA55C0054F2157EAF740400B410E4A98FA55C09F573CF548F74040739F1C0588FA55C0F2ECF2AD0FF740403332C85D84FA55C07B9FAA4203F740402920ED7F80FA55C0999B6F44F7F640402BBCCB457CFA55C0FE43FAEDEBF640401B9FC9FE79FA55C0137F1475E6F64040698A00A777FA55C00AA1832EE1F640405F44DB3175FA55C0A1BAB9F8DBF64040BAF770C971FA55C039083A5AD5F64040E5266A696EFA55C048861C5BCFF640406F2A52616CFA55C044317903CCF640407092E68F69FA55C005DEC9A7C7F640408A3C49BA66FA55C0A8716F7EC3F64040DFFB1BB457FA55C0D0622992AFF64040CEF8BEB854FA55C0C093162EABF64040B81E85EB51FA55C01C7BF65CA6F64040252367614FFA55C0E318C91EA1F64040EFE192E34EFA55C0C63368E89FF64040FCC3961E4DFA55C0E6E8F17B9BF64040F73AA92F4BFA55C0E3FBE25295F640409E3D97A949FA55C0ABCDFFAB8EF64040AB05F69848FA55C0431B800D88F640404C1762F547FA55C0F981AB3C81F64040F9BCE2A947FA55C08C12F4177AF6404052EE3EC747FA55C0654F029B73F640405E82531F48FA55C01BB62DCA6CF640402DCA6C9049FA55C0C1C8CB9A58F640409DBB5D2F4DFA55C0486B0C3A21F6404013ECBFCE4DFA55C040C1C58A1AF64040B986191A4FFA55C0C24EB16A10F64040603B18B14FFA55C00B9755D80CF6404006D671FC50FA55C0D368723106F640402F4FE78A52FA55C04D9D47C5FFF54040F2E8465854FA55C0D93C0E83F9F54040211FF46C56FA55C07747C66AF3F54040EA758BC058FA55C068ACFD9DEDF54040C537143E5BFA55C03CF88903E8F54040F92AF9D85DFA55C003965CC5E2F54040E066F16261FA55C03CDBA337DCF54040D94125AE63FA55C04434BA83D8F540401D1EC2F869FA55C0317898F6CDF54040804754A86EFA55C08FFB56EBC4F5404071FDBB3E73FA55C0EEE6A90EB9F54040FF3BA24275FA55C04B02D4D4B2F54040B75B920376FA55C06A8313D1AFF5404098F4F75278FA55C00B7BDAE1AFF5404001DE02098AFA55C040BCAE5FB0F540402EC901BB9AFA55C0A5811FD5B0F5404010CAFB389AFA55C034828DEBDFF54040882EA86F99FA55C04FADBEBA2AF64040F3CAF5B699FA55C08444DAC69FF64040FA0B3D62F4FA55C08B355CE49EF6404093AAED26F8FA55C05BB1BFEC9EF64040395FECBDF8FA55C06EFAB31F29F640402DB1321AF9FA55C033A6608DB3F540402B4F20EC14FB55C02CB5DE6FB4F5404088EFC4AC17FB55C09D280989B4F54040E76B96CB46FB55C00E68E90AB6F54040A1D9756F45FB55C0DEC7D11C59F740405ED4EE5701FB55C0088F368E58F740404AB0389CF9FA55C067976F7D58F74040B08F4E5DF9FA55C0D6FF39CC97F7404051BB5F05F8FA55C0672AC423F1F840405BB4006DABFA55C08F899466F3F840401ADF1797AAFA55C05A47551344F940406D533C2EAAFA55C08C0FB3976DF94040CBF10A444FFB55C0C25087156EF940404F75C8CD70FB55C0F1D4230D6EF94040D9E6C6F484FB55C0A437DC476EF940405E7EA7C98CFB55C0988922A46EF94040B96E4A79ADFB55C0669DF17D71F940407B0E2C47C8FB55C012DBDD0374F94040F3583332C8FB55C081035ABA82F940400BB5A679C7FB55C08B8862F206FA40405852EE3EC7FB55C067D5E76A2BFA40409A417C60C7FB55C03D5FB35C36FA4040BDE3141DC9FB55C0C0081A3389FA404085CB2A6C06FC55C011FB04508CFA4040309E4143FFFB55C02D95B7239CFA40400873BB97FBFB55C06B80D250A3FA4040EBA7FFACF9FB55C06FD575A8A6FA40403AADDBA0F6FB55C00183A44FABFA404024B9FC87F4FB55C0410A9E42AEFA404055D97745F0FB55C08CD7BCAAB3FA404063EFC517EDFB55C0C66D3480B7FA4040CF85915ED4FB55C0ABAFAE0AD4FA4040836A8313D1FB55C0D3DA34B6D7FA4040683BA6EECAFB55C0404AECDADEFA404009336DFFCAFB55C063096B63ECFA40402618CE35CCFB55C00B2593533BFB404055682096CDFB55C0AFCDC64ACCFB4040639813B4C9FB55C047E7FC14C7FD4040A5BBEB6CC8FB55C03DF0315871FE4040E1ED4108C8FB55C02E1A321EA5FE4040F0164850FCFB55C0C3633F8BA5FE4040AA09A2EE03FC55C0F6CE68AB92FE404085CE6BEC12FC55C0BEDA519CA3FE40407823F3C81FFC55C022FE614B8FFE40406C921FF12BFC55C0A9F7544E7BFE4040840B790437FC55C0425C397B67FE4040AED2DD7536FC55C0144031B264FE4040EAEA8EC536FC55C0F6CFD38041FE40401B0E4B033FFC55C032022A1C41FE404040321D3A3DFC55C0772FF7C951FE40405E7F129F3BFC55C0E36A64575AFE40409542209738FC55C0D250A39064FE40409BFF571D39FC55C02B685A6265FE4040E9D0E97937FC55C03B376DC669FE40405A10CAFB38FC55C04B3ACAC16CFE4040122D793C2DFC55C0FF3EE3C281FE4040A19C685721FC55C06CCB80B394FE40407BF65CA626FC55C0C24CDBBFB2FE4040AD33BE2F2EFC55C0DB847B65DEFE404035ECF7C43AFC55C0C5A70018CFFE404031E884D041FC55C0A930B610E4FE4040CC22145B41FC55C00FB56D1805FF4040CBBA7F2C44FC55C0BB438A0112FF40405C01857AFAFB55C0D26BB3B112FF404062BEBC00FBFB55C00F5EBBB4E1FE404094F8DC09F6FB55C01092054CE0FE404064E60297C7FB55C0CFA2772AE0FE40400BB5A679C7FB55C03106D671FCFE4040118C834BC7FB55C0E67283A10EFF404017B5FB5580FB55C029CAA5F10BFF4040F3AACE6A81FB55C03274ECA012FF4040B7442E3883FB55C098A0866F61FF404005FC1A4982FB55C0274A42226DFF40402FDD240681FB55C032AD4D637BFF40405C9198A086FB55C0629F008A91FF4040B8AF03E78CFB55C0C07971E2ABFF4040C5FCDCD094FB55C0614D6551D8FF40406F9EEA909BFB55C03BFE0B0401004140D79E5912A0FB55C06397A8DE1A004140F5BA4560ACFB55C0ED7C3F355E00414045459C4EB2FB55C0C440D7BE800041409D2B4A09C1FB55C09BE09BA6CF0041409CC3B5DAC3FB55C08EE733A0DE004140B29DEFA7C6FB55C021E692AAED004140BCC96FD1C9FB55C02AE109BDFE0041407F2F8507CDFB55C01A4CC3F011014140191C25AFCEFB55C015E0BBCD1B014140CB4A9352D0FB55C0FE08C3802501414011DDB3AED1FB55C0541C075E2D0141407C7901F6D1FB55C035CF11F92E014140FC87F4DBD7FB55C05A643BDF4F0141405303CDE7DCFB55C0AB5CA8FC6B01414041B8020AF5FB55C09FE238F06A014140BDA59C2FF6FB55C081035ABA82014140E6046D72F8FB55C0346612F5820141403B1BF2CF0CFC55C0346612F582014140423F53AF5BFC55C0346612F582014140956588635DFC55C055D97745F0014140D66EBBD05CFC55C006F1811DFF0141407BB94F8E02FC55C07BB94F8E02024140D4997B48F8FB55C0817687140302414074435376FAFB55C074B169A5100241400D164ED2FCFB55C0D3A23EC91D024140ED6305BF0DFC55C02781CD3978024140271422E010FC55C02BBF0CC688024140C2853C821BFC55C00612143FC60241400FEF39B01CFC55C039D4EFC2D602414091B3B0A71DFC55C0F84D61A582024140F4A10BEA5BFC55C0234910AE80024140425C397B67FC55C065389ECF800241404EF04DD367FC55C0E44C13B69F024140CAF78C4468FC55C0B29AAE27BA0241401E6CB1DB67FC55C0CC237F30F002414012000000656F29E78BF855C01188D7F50BFE4040868C47A984F855C0730F09DFFBFD404070B20DDC81F855C094490D6D00FE4040F4F8BD4D7FF855C07A51BB5F05FE40402B8881AE7DF855C0901150E108FE404032AD4D637BF855C01CCEFC6A0EFE4040EB34D25279F855C0CC608C4814FE404026FC523F6FF855C056EF703B34FE4040E36DA5D766F855C0016729594EFE4040961E4DF564F855C093E00D6954FE4040EAAC16D863F855C0C7B94DB857FE40408922A46E67F855C0B56B425A63FE4040580229B16BF855C09E4319AA62FE4040CCB051D66FF855C0802A6EDC62FE4040654F029B73F855C0DEFE5C3464FE40409A42E73576F855C0679AB0FD64FE4040280989B48DF855C0B742588D25FE4040656F29E78BF855C01188D7F50BFE4040',
        ]);

        DB::table(config('taxes.tax_areas'))->insert([
            'name' => 'Guin Occupational Tax',
            'tax' => GuinOccupational::class,
            'governmental_unit_area_id' => $id,
        ]);
    }
}
