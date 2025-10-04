-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- 호스트: localhost
-- 생성 시간: 25-05-23 00:35
-- 서버 버전: 10.11.11-MariaDB
-- PHP 버전: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `shop36`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `game`
--

CREATE TABLE `game` (
  `id` int(10) UNSIGNED NOT NULL,
  `genre` int(11) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `coname` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `opt1` int(11) DEFAULT NULL,
  `opt2` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `regday` date DEFAULT NULL,
  `icon_new` tinyint(4) DEFAULT NULL,
  `icon_hit` tinyint(4) DEFAULT NULL,
  `icon_sale` tinyint(4) DEFAULT NULL,
  `discount` tinyint(4) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `image6` varchar(255) DEFAULT NULL,
  `captbig1` varchar(255) NOT NULL,
  `captbig2` varchar(255) NOT NULL,
  `captbig3` varchar(255) NOT NULL,
  `captbig4` varchar(255) NOT NULL,
  `captsmall1` varchar(255) NOT NULL,
  `captsmall2` varchar(255) NOT NULL,
  `captsmall3` varchar(255) NOT NULL,
  `captsmall4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 테이블의 덤프 데이터 `game`
--

INSERT INTO `game` (`id`, `genre`, `code`, `name`, `coname`, `price`, `opt1`, `opt2`, `status`, `regday`, `icon_new`, `icon_hit`, `icon_sale`, `discount`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `captbig1`, `captbig2`, `captbig3`, `captbig4`, `captsmall1`, `captsmall2`, `captsmall3`, `captsmall4`) VALUES
(1, 1, '엘밤통', 'ELDEN RING 밤의 통치자', 'FromSoftware, Inc.', 49800, 1, 2, 1, '2025-05-30', 1, 1, 0, 0, 'HLO_PEO_DWwSXAAZO1dRyS1I3TxY7nGV6N6e-zNEn9aGXbSRyCNi1hCs-MQ6UyKjnD5zvjSQ4UyrqZpFLCs99OkexgcVrhJZ4fPkKUSCt06rwL5C_gAlQigA9jIZiMISGGb1MNSGu9hEM2GNpiXsUQ_682db98f54aa7.webp', 'HLO_PEO_DWwSXAAZO1dRyS1I3TxY7nGV6N6e-zNEn9aGXbSRyCNi1hCs-MQ6UyKjnD5zvjSQ4UyrqZpFLCs99OkexgcVrhJZ4fPkKUSCt06rwL5C_gAlQigA9jIZiMISGGb1MNSGu9hEM2GNpiXsUQ_682db09fa368f.webp', 'ss_1deefb0b7ea597f4227777239910b4990aa0cc77_682db1ad470e8.jpg', 'ss_edfd360b92d6f9b983b759fd837e664b86cd9563_682db1ad4885a.jpg', 'ss_802cd66236d951fba204fb9980e2c0c9213a264c_682db1ad4792f.jpg', 'ss_0b9594934db8a1457c915e200f9d0d9b447a3df4_682db1ad4621b.jpg', '『ELDEN RING 밤의 통치자』에 대해', '함께 맞서라', '영웅이 되어라', '밤에 도전하라', '『ELDEN RING 밤의 통치자』는 ELDEN RING 세계관을 이용해 게임의 핵심 디자인을 재구축하여<br>플레이어에게 새로운 게임 체험을 전달하고자 하는 신작 어드벤처 게임입니다.', '다른 플레이어와 협력해 다가오는 밤과 그 안에 숨은 위험에 맞서라.', '유니크한 스킬을 지닌 영웅들을 지휘하자.<br>강력한 영웅들이 팀이 되어 단결하면, 그 스킬 또한 강력한 상승효과를 일으킬 것이다.', '게임 세션마다 변화하는, 토지를 지배하는 가차없는 환경의 위협을 이겨내고<br>그 밤의 장대한 보스를 물리치자!'),
(2, 1, '렘넌트', 'Remnant: From the Ashes', 'Gunfire Games', 41000, 1, 0, 1, '2019-08-20', 0, 1, 1, 10, 'Remnant_From_the_Ashes_cover_art_682dd4de66431.jpg', 'Remnant_From_the_Ashes_cover_art_682dd4de664e0.jpg', 'ss_6d234391191327ff664161d190ef2eb0118d3477_682dd4de6653e.jpg', 'ss_452648c888ce4a031e5fdd6c5322ab554b8d0e51_682dd4de6668e.jpg', 'ss_6a3c7966f9e2409b6ec089ad310f5abcdbbbef68_682dd4de667c3.jpg', 'ss_c6ffebb1ce67bf2715167b2d3150c6e59427a50f_682dd4de668e0.jpg', '인류의 잔재', '끝없는 환상적인 세계가 당신을 기다립니다', '약탈하고, 강화하고, 특화하라', '많으면 많을수록 좋다', '고대의 이차원에서 온 악이 세상을 혼란에 빠뜨렸습니다. 인류는 생존을 위해 처절하게 싸우고 있지만, 다른 차원과 대체 현실로 통하는 포탈을 열 수 있는 기술을 가지고 있습니다. 이 포탈들을 통해 인류는 그 악이 어디서 왔는지의 수수께끼를 풀고, 생존을 위한 자원을 찾아내며, 반격에 나서야 합니다. 그리고 그 속에서 인류가 다시 일어설 수 있는 거점을 구축해야 합니다…', '게임을 할 때마다 새롭게 생성되는 역동적인 세계를 탐험해 보세요. 맵, 적의 조우 방식, 퀘스트 기회, 세계 속 사건들이 매번 달라지며 새로운 경험을 선사합니다. 게임에 등장하는 네 개의 고유한 세계는 각각 끔찍한 괴물들과 도전적인 환경으로 가득 차 있으며, 플레이할 때마다 새로운 도전을 제공합니다. 적응하고 탐험하세요… 아니면 죽음을 맞이할 것입니다.\r\n\r\n', '가혹한 적들과 강력한 보스들을 처치하며 경험치와 귀중한 전리품, 그리고 무기, 방어구, 개조 파츠 제작에 필요한 업그레이드 재료를 획득하세요. 이를 통해 수십 가지의 다양한 방식으로 전투에 접근할 수 있는 강력한 무기고를 만들어낼 수 있습니다.\r\n\r\n', '다른 세계로 침공해 뿌리를 근절하려는 시도는 매우 위험하며, 생존이 보장되지 않습니다. 최대 두 명의 다른 플레이어와 함께 팀을 구성하여 생존 확률을 높이세요. 협동은 이 게임의 가장 어려운 도전을 극복하고, 최고의 보상을 얻기 위한 필수 요소입니다.\r\n\r\n'),
(3, 2, '호포웨', 'Horizon Forbidden West™', 'Guerrilla Games', 62800, 1, 2, 1, '2022-02-18', 1, 0, 0, 0, '601649_682e0e7d61a19.webp', '601649_682e0e7d61d2d.webp', 'ss_2d05273cef37bcc3651dc9dbea42dbeca5f5f196.1920x1080_682e0ed031f63.jpg', 'ss_b7d25b4a328003d340913377793e83c961f2d7ab.1920x1080_682e0ed0320cd.jpg', 'ss_a4a19b86e80488f3d608e835e5ae3086760db866.1920x1080_682e0ed032199.jpg', 'ss_87750b2dbc34d82d1ffef7aaab40a9f46d970d99.1920x1080_682e0ed032265.jpg', '', '', '', '', '먼 미래를 배경으로 한 호라이즌의 포스트 아포칼립스 세계로 돌아가 머나먼 땅을 탐험하고,<br>더 거대해진 웅장한 기계들과 싸우고, 놀랍고 새로운 부족과 조우하세요.\r\n', '대지가 죽어갑니다. 맹렬한 폭풍과 막을 수 없는 병충해가 산산이 흩어진 인류의 잔존자들을 유린하고, <br>부족 간 접경 지역에는 위험하고 새로운 기계들이 도사립니다. 지구의 생명체가 또 다른 멸종을 향하고 있습니다.\r\n', '오직 에일로이만이 종말의 위협을 불러온 비밀을 파헤치고 세상에 질서와 균형을 가져올 수 있습니다.<br>이 여정 속에서 그녀는 옛 동료들과 조우하고, 호전적인 새 부족들과 동맹을 맺으며 고대 유산의 수수께끼를 풀어야 합니다.\r\n', ''),
(4, 2, '스카이림', 'The Elder Scrolls V: Skyrim', 'Bethesda Game Studios', 45000, 1, 0, 1, '2011-11-11', 0, 0, 0, 0, 'juERjL0aUNfA0IevUZde0538d3PRtzANFTN6UmqRAs_k2Lbe7KwNafe-aFFkZJClFQI87Smqo4IkEdwskBi_RGfurk7qNod-1gKG7fC8NsjX24u6oWC8-OKbawUKp1urZJmXE7FKrdD-S-OHySgHVQ_682dda3abaa07.webp', 'juERjL0aUNfA0IevUZde0538d3PRtzANFTN6UmqRAs_k2Lbe7KwNafe-aFFkZJClFQI87Smqo4IkEdwskBi_RGfurk7qNod-1gKG7fC8NsjX24u6oWC8-OKbawUKp1urZJmXE7FKrdD-S-OHySgHVQ_682dda3abaabc.webp', 'ss_5d19c69d33abca6f6271d75f371d4241c0d6b2d1_682dda3abab19.jpg', 'ss_921ccea650df936a0b14ebd5dd4ecc73c1d2a12d_682dda3abac77.jpg', 'ss_07bc094ab6223d680c809735bbbadfc7ff733905.1920x1080_682dda3abad54.jpg', 'ss_038abb71457edf636529dd7b5f898a7311dea359.1920x1080_682dda3abadfd.jpg', '다른 세상에서의 새로운 삶', '새로운 그래픽과 게임엔진', '플레이의 주체는 당신', '용의 귀환', '당신이 원하는 종류의 캐릭터를 만들고, 마음대로 플레이하세요.<br>이전 다른 게임들에서는 절대 느껴보지 못했던 전설적인 선택, 스토리 진행, 여행의 자유도가 여러분을 기다립니다.\r\n', 'Skyrim은 새로운 게임 엔진을 통해 두루마리 구름, 바위 산, 시끌벅적한 도시, 우거진 평야, 고대 던전 등<br>완벽한 가상 세계를 만들어 냈습니다.\r\n', '당신은 수백 가지의 무기, 주문, 능력 중 마음에 드는 것을 선택하실 수 있습니다.<br>새로운 캐릭터 시스템을 통해 원하는 대로 플레이하고, 그 플레이을 통해서 스스로를 정의하세요.\r\n', '그 어디서도 보지 못했던 고대 용과의 전투를 경험하세요.<br>게임 속에서 당신은 드래곤본으로서 용들의 힘에 대한 비밀을 배우고 자신의 것으로 만들 수 있습니다.\r\n'),
(5, 1, '몬헌월드', 'Monster Hunter: World', 'CAPCOM Co., Ltd.', 34800, 1, 2, 1, '2018-08-09', 0, 1, 0, 0, 'co1rst_682efd8d798dd.jpg', 'co1rst_682efd8d79b9b.jpg', 'ss_25902a9ae6977d6d10ebff20b87e8739e51c5b8b_682efe6167e23.jpg', 'ss_681cc5358ec55a997aee9f757ffe8b418dc79a32_682efe4f1ad36.jpg', 'ss_ce69dc57e6e442c73d874f1b701f2e4af405fb19_682efe4f1b5ec.jpg', 'ss_a262c53b8629de7c6547933dc0b49d31f4e1b1f1_682efe4f1bbd3.jpg', '웅장한 자연 속에서 거대한 몬스터에 맞서라.', '살아 숨쉬는 세계', '다양한 무기와 장비, 그리고 믿음직한 파트너', '다양한 무기', '플레이어는 헌터가 되어 다양한 환경에 서식하는 몬스터를 사냥하는 퀘스트를 수주합니다.<br>몬스터를 사냥하고 입수한 소재를 이용해 더 강한 무기와 방어구를 만들고, 더욱 강력한 몬스터에 도전해 나갑니다.', '다양한 생물군이 활발하게 살아가는 각종 필드. 탐색할수록 여러 가지를 발견하게 된다.\r\n', '스스로의 힘으로 모든 걸 해내고 미지의 세계를 활짝 열어라.\r\n', '헌터는 각각 특징과 액션이 다른 14종의 무기를 다룰 수 있다.<br>하나의 무기에만 집중할지, 여러 무기를 다룰지, 선택은 헌터의 몫이다.'),
(17, 2, '블본', 'Bloodborne™', 'FromSoftware, Inc.', 40800, 2, 0, 1, '2015-03-24', 0, 1, 0, 0, '1-1ca00df01500_682dc88d4070d.png', '1-1ca00df0_682dc5a402394.png', 'bloodborne-screen-07-ps4-jp-09apr21_682dc5a402980.webp', 'bloodborne-screen-12-ps4-jp-09apr21_682dc5a402aa0.webp', 'bloodborne-screen-13-ps4-jp-09apr21_682dc5a402bb8.webp', 'bloodborne-screen-18-ps4-eu-10nov14_682dc5a402ce2.webp', '악몽을 사냥하라', '창백한 피를 구해라. 사냥을 완수하기 위해', '어둠 속의 비밀을 파헤쳐라', '', '외로운 여행자. 저주에 걸린 도시. 치명적인 미스테리가 모든 것을 휩싸고 있습니다.<br>썩어가는 도시, 야남에 입성하여 당신의 두려움과 마주하십시오. ', '피의 전염병에 걸린 시민들이 도시를 횡행합니다.<br>짙은 어둠 속의 비밀을 파헤치고, 검과 총을 사용하여 창백한 피의 진정한 의미를 발견하십시오.<br>어쩌면 살아남을 수 있을지도 모릅니다…', '야남은 저주받은 것으로 알려져 있으며 야수병이라 불리는 풍토병으로 악명을 떨쳤습니다.<br>야수병은 인간의 이성을 약화시키며 결국 인간을 야수로 변화시킵니다. 밤에 사냥꾼들은 이 인간이 아닌 존재들을 찾아 나섭니다.', ''),
(18, 2, '꼴', 'DARK SOULS™ II', 'FromSoftware, Inc.', 8200, 1, 2, 1, '2015-04-02', 0, 0, 0, 0, '9562353_682dc9ff424c7.jpg', '956235322_682dc9ff42596.jpg', 'ss_ea36ab9841c656e321ab55a98e60ae37d4a4ebd6.1920x1080_682dc9ff42605.jpg', 'ss_fe75766ecb5828879ce1ee74b0ff345343ec33b2.1920x1080_682dc9ff426db.jpg', 'ss_fe08dabb3c130ea401666f47e2eee03f6d1abee2.1920x1080_682dc9ff42790.jpg', 'ss_fefa2549a53d216fb7fc1ffde6e992225e06fadf_682dc9ff4288f.jpg', '', '', '', '', '여러분은 DARK SOULS™ II: Scholar of the First Sin에 크게 놀랄 것입니다.<br>기존 DARK SOULS™ II를 플레이 하셨다 해도 이 특별한 \"디렉터즈 컷\" 버전의 게임을 통해 완전히 역겨운 경험을 하게 될 것입니다.', '기존 플레이 경험과는 전혀 다른 느낌을 제공하기 위하여 적의 배치가 변경되었으며 적들은 이전에는 하지 않던 새로운 행동을 하고,<br>알고 있던 안전지대들은 이제 더이상 안전하지 않습니다. 아이템 배치와 아이템 드랍 또한 변경되었습니다.<br>DARK SOULS™ II을 통해 단련된 모든 것들을 잊어버려야만 할 것입니다.\r\n', '새로운 NPC 침략자, \"상실자\"는 게임 플레이 경험을 바꾸는 핵심이 될 것입니다.<br>\"상실자\"는 온라인에 접속하여 플레이하고 있다면 어디서나 나타날 수 있습니다.', '온라인 플레이 또한 강화되었습니다. 전투 중에 소울 획득을 제한하는 아이템 추가를 통해 매칭 시스템이 개선되었으며,<br>이로 인하여 지속적으로 온라인 매칭이 가능하게 되었습니다. 또한 참여 가능한 플레이어 수 또한 4인에서 6인으로 증가되었습니다.<br>이러한 온라인 플레이의 변화로 전략적인 플레이의 새로운 접근법이 요구될 것입니다.'),
(19, 2, '똥3', 'DARK SOULS™ III', 'FromSoftware, Inc.', 49800, 1, 2, 1, '2016-04-12', 0, 1, 1, 50, 'Dark_souls_3_cover_art_682dbb3d482fe.jpg', 'v8JlD8KcQUtTqaLBmpFnj1ESRR5zMkLk_682dbb79e34fd.webp', 'ss_1c0fa39091901496d77cf4cecfea4ffb056d6452_682dbc76eaa93.jpg', 'ss_5efd318b85a3917d1c6e717f4cb813b47547cd6f_682dbc76ebe87.jpg', 'ss_975ca4966b9b627f8d9bb0d2c9b6743dfceac6da.1920x1080_682dbc76ed417.jpg', 'ss_27397db724cfd5648655c1056ff5d184147a4c50_682dbc76ed815.jpg', '한계를 넘어, 또 한 걸음', '불은 사그라들고, 왕들에겐 옥좌가 없도다', '그리고 불 꺼진 재들이 찾아온다', '재는 잔불을 바라는 거야', 'DARK SOULS™ III에서, 장르를 새로 개척했다는 평가를 들으며 많은 좋은 평가들을 얻고 있는 다크 소울 시리즈가<br>계속해서 한계를 넘어서, 더욱 야심찬 단계에 도전하고자 하고 있습니다.', '불꽃이 사라지고 세계가 폐허로 변하여, 더욱 악랄하고 위험해진 적들과 환경 속으로 여행을 떠나십시오. <br>플레이어들은 장대한 세계관, 더욱 빨라진 게임 플레이와 잘 짜여진 전투 시스템에 빠져들게 될 것입니다. ', '시리즈의 전통적인 팬과 새로 시리즈에 입문하시는 분들 모두 더욱 발전된 게임 플레이와 놀라운 그래픽을 경험하실 수 있습니다.', '이제 그저 잔불만이 남아있을 뿐... 한 번 더 준비를 하고 어둠을 밝히십시오!'),
(21, 7, '피구라', 'P의 거짓 (Lies of P)', 'NEOWIZ', 64800, 0, 0, 1, '2023-09-18', 1, 0, 0, 0, 'lop-cover-art_682eff3b7e589.jpg', 'lop-cover-art_682eff3b7e63a.jpg', 'ss_b510d9d65802c3cc776d1296c3daa1e9a79e3615_682effb5332bd.jpg', 'ss_132a6579a7c2f3241e55ef9ce3eae798786168ad_682effb533981.jpg', 'ss_26772232e759f37d0841d054cf30604fe4bba434_682effb5343ae.jpg', 'ss_6da0465ea662d368ad4b2cf1c0812faa1d0ca317_682effb534e08.jpg', '', '', '', '', '에르고의 발견으로 전성기를 누리던 크라트 시는 인형의 폭주로 한 순간에 끔찍한 비극의 장소가 되었습니다.<br>많은 이들이 죽고 살아남은 자들은 이 사태가 끝나기를 막연하게 기다릴 뿐입니다.\r\n', '바로 그때, 잠들어 있던 어떤 인형이 파란 나비의 속삭임에 깨어납니다.<br>그리고 피의 비극이 벌어지고 있는 크라트 시를 가로질러 제페토를 찾아 나섭니다.', '천재적인 인형 장인 제페토는 크라트 시에서 벌어지는 참극을 보고 이를 해결하고자 합니다.<br>제페토의 인형인 당신은 제페토의 의지를 이어받아 크라트 시의 절망적인 상황을 해결하기 위해 미쳐버린 인형들과 맞서는 여정을 떠납니다.', ''),
(22, 1, '세키로', 'Sekiro™: Shadows Die Twice ', 'FromSoftware, Inc.', 75000, 1, 2, 1, '2019-03-22', 0, 1, 1, 50, '6a3f7577d80b874c7460c301d586312d_682dc8469ea30.jpg', 'ENT-05_SEKIRO-SHADOWS_DIE_TWICE_BG000142-768x766_682dc25ac9e64.jpg', 'ss_0f7b0f8ed9ffc49aba26f9328caa9a1d59ad60f0_682dc2a0ca3c6.jpg', 'ss_3d6b38c382c0eafb02dc90d22f33fd292e4e5cf3_682dc2a0ca8fd.jpg', 'ss_1e6f5540866a5564d65df915c22fe1e57e336a6f.1920x1080_682dc2bebe4a7.jpg', 'ss_15f0e9982621aed44900215ad283811af0779b1d_682dc2bebeaca.jpg', '외팔이 늑대, 전란에 숨어들다', '목숨 걸어 지키고, 사로잡혔다면 반드시 되찾아라', '복수하라. 명예를 되찾아라', '영리하게 죽여라', 'Sekiro: Shadows Die Twice에서 당신은 명예와 온전한 신체를 모두 잃은, 죽음 직전에서 구조된 전사 “외팔의 늑대”가 됩니다.', '고대 혈통의 계승자인 어린 주군을 보호하기로 맹세한 당신은, 위협적인 아시나 가문을 포함한 다양하고 잔혹한 적들의 표적입니다.<br>어린 주군이 포로로 잡힌다면, 그 무엇도 당신이 명예를 회복하기 위한 위험한 여정을 떠나는 것을 막을 수 없습니다. 죽음 그 자체도 말이죠.', '어둡고 뒤틀린 세계에서 상식을 넘어서는 적들과 마주하며, 죽음과 삶의 갈등이 항상 존재하는 잔혹한 1500년대 일본 전국 시대를 탐험하세요.<br>피가 난무하는 전투에서 은신, 수직 이동, 그리고 직관적인 격투를 혼합하며 치명적인 도구들과 강력한 닌자 능력을 개방하세요.', '복수하세요. 명예를 회복하세요. 창의적인 방법으로 적을 죽이십시오.'),
(23, 2, '호제던', 'Horizon Zero Dawn™', 'Guerrilla Games', 58800, 1, 2, 1, '2017-02-28', 0, 1, 1, 20, '71gCM8JhzdL_682e0d0b3ce74.jpg', '71gCM8JhzdL_682e0c818c327.jpg', 'ss_0e5d0eb8f55e5c201e5bfdaf605ecd20e568771e.1920x1080_682e0c818c3ce.jpg', 'ss_cf69250b6b7144244fe5ec715a82e9cf52398715.1920x1080_682e0c818c451.jpg', 'ss_d10acc633e3125f9f7b1398f1d2ace380a30cc48.1920x1080_682e0c818c506.jpg', 'ss_eea08b3d6b4fe9c1d44d2c5aeb669cfaec8c0e46.1920x1080_682e0c818c623.jpg', '지구는 이제 우리 것이 아니다', '', '', '', '젊은 기계 사냥꾼이자 부족의 추방자인 에일로이가 되어 활과 창을 들고서 출생의 비밀을 파헤치고,<br>이 신비로운 세계의 진실을 찾아내며, 다가오는 파멸에서 세계를 구해야 하는 운명을 향해 나아가세요.', '에일로이는 여행을 하면서 독특한 부족과 활기 넘치는 정착지, 그리고 매력적인 캐릭터와 동료들을 만나게 됩니다.', '이 오픈 월드는 야생 동물과 위험으로 가득한 곳이기도 합니다.<br>경이롭지만 치명적이며 적대적인 기계들이 알 수 없는 힘에 의해 폐허가 된 장엄한 풍경 속을 배회합니다.\r\n\r\n', '전투에서는 무시무시한 기계와 사악한 적대 세력을 상대로 흥미로운 무기를 이용해 강력한 전략적 공격을 가할 수 있습니다.'),
(24, 2, '엘든링', 'ELDEN RING', 'FromSoftware, Inc.', 64800, 1, 2, 1, '2022-02-25', 1, 1, 0, 0, 'Elden_ring.jpg', 'Elden_ring.jpg', 'ss_3c41384a24d86dddd58a8f61db77f9dc0bfda8b5_682da94ee91d0.jpg', 'ss_510a02cf3045e841e180f2b77fb87545e0c8b59d_682da94ee9462.jpg', 'ss_943bf6fe62352757d9070c1d33e50b92fe8539f1_682da94ee96df.jpg', 'ss_dcdac9e4b26ac0ee5248bfd2967d764fd00cdb42_682da94ee993d.jpg', '자극으로 가득한 드넓은 세계', '나만의 캐릭터', '신화에서 태어나는 군상극', '다른 플레이어와 느슨하게 연결되는<br>독자적인 온라인 플레이', '다채로운 시추에이션을 지닌 탁 트인 필드와 복잡하면서 입체적으로 짜인 거대한 던전이 경계선 없이 이어지는 드넓은 세계.<br>탐색 끝에는 미지의 것들을 발견했다는 기쁨과 높은 성취감으로 이어지는 압도적인 위협이 플레이어를 기다립니다.', '플레이어 캐릭터는 겉모습의 커스터마이즈뿐만 아니라 지니는 무기와 방어구, 마법을 자유롭게 조합할 수 있습니다.<br>근력을 높여 강인한 전사가 되거나 마술의 극치에 다다르는 등, 각자의 플레이 스타일에 맞춰 캐릭터를 성장시킬 수 있습니다.', '단편적으로 이야기되는 중층적인 구조의 이야기.<br>「틈새의 땅」을 무대로 등장인물들의 다양한 의도가 교착하는 군상극이 전개됩니다.', '다른 플레이어와 직접적으로 연결되어 함께 여행하는 멀티플레이에 더해,<br>다른 플레이어의 존재를 느낄 수 있는 독자적인 비동기 온라인 요소도 지원합니다.'),
(25, 2, '다소리', 'DARK SOULS™', 'FromSoftware, Inc.', 43800, 2, 0, 1, '2011-09-22', 0, 0, 1, 30, '2224_Dark_Souls_682dce48ee612.webp', '2224_Dark_Souls_682dce48ee73b.webp', 'ss_5efe46f2e2c65040f529a0d0e7069d6b8bb8e175_682dce48ee808.jpg', 'ss_7e76bf1c16414829b38ef141602757e012458ec7_682dce48eeaad.jpg', 'ss_c34cdf130b9ac71c99196007d1e78c05305652b9_682dce48eec5a.jpg', 'ss_3a9efe05e0c9d6e0ef9644ef1678ce1a25ab424a_682dce48eed66.jpg', '죽음을 준비하라', '극도로 심오하고 어두우며 어려운 난이도', '삶과 희망의 상징', '사명을 완수해라', 'Dark Souls 은 액션 롤플레잉 게임으로 Demon’s Souls을 개발한 FromSoftware 사의 신작입니다.<br>Dark Souls은 다크 판타지 세계, 긴박한 던전 탐험, 무시무시한 적과의 대면, 고유의 온라인 소통 등 다양하고 친숙한 기능들을 포함할 것입니다. ', '로드란 세계를 중심으로 펼쳐지는 새롭고 불가사의한 이야기를 기대하십시오.<br>당신은 무수히 많은 살인적인 함정, 음울하고 기괴한 몬스터, 거대하고 강력한 악마 및 드래곤과 대면할 것입니다.', 'Dark Souls에 새롭게 추가된 모닥불은 방대한 모험의 사투를 벌이는 곳에서 체크 포인트 역할을 합니다.<br>모닥불에서 휴식을 취하면 체력과 마법이 보충되지만 그 대가로 모든 몬스터가 재생성됩니다.<br>Dark Souls에서 진정한 안전지대는 없으니 주의하십시오.', 'Dark Souls은 올해의 게임 중 도전의식을 가장 크게 불러일으키는 게임인 것을 느끼실 수 있을 겁니다.<br>수백만 번의 죽음을 뚫고 최고의 영웅이 될 수 있을까요?'),
(26, 4, '호텔더스크', '호텔 더스크의 비밀', 'CiNG', 37000, 2, 0, 1, '2009-02-12', 0, 1, 0, 0, 'Hotel_Dusk_682e024a230a5.png', 'Hotel_Dusk_682e024a23312.png', '20090227144526_5758_682e02eaabbcf.jpg', '20090227144526_1440_682e02eaabdc7.webp', '20090227144526_8976_682e02eaabf4d.jpg', '20090227144526_6191_682e02eaac0ce.webp', '', '', '', '', '', '', '', ''),
(27, 1, '데메크', 'Devil May Cry 5', 'CAPCOM Co., Ltd.', 33400, 2, 1, 1, '2019-03-08', 0, 0, 1, 40, '9154237_682e0a142f7e7.jpg', 'DMC5_Base_game_682e09e66c60e.webp', 'ss_4ce180ed8979a51c72de51f985e9e9ba13500508_682e0a7cb8e96.jpg', 'ss_4410bada2565843dae693b03ac3a50256ff5dd66_682e0a7cb8ffa.jpg', 'ss_d1e0b403f593f17ad195c5382a7788d71c6f406a_682e0a7cb9121.jpg', 'ss_e2be70565f94a7f6c392cccddce08c67f2f87612_682e0a7cb91da.jpg', '', '', '', '', '화려한 그래픽과 멈출 수 없는 액션.<br>차세대 콘솔에 맞춰 더욱 강력해진 「Devil May Cry 5」가 돌아왔다!', '지금껏 본 적 없는 화려함과 따라 잡을 수 없는 속도감!<br>터질 듯한 스피드와 흠잡을 데 없는 조작성 그리고 긴장감 넘치는 스토리로 지금껏 경험하지 못한 \"스타일리시한 쾌감\"을 느껴보세요.<br>다수의 수상 경력에 빛나는 최고의 스타일리시 액션 게임!\r\n', '마검교단에서의 일이 있고 수년 후, 또 다른 강력한 악마가 전세계를 위협하기 시작하고,<br>그것을 저지하기 위해 분투하는 전설의 데빌 헌터 \"단테\"와 \"네로\", 그리고 새롭게 등장한 \"V\". \r\n', ''),
(28, 1, '갓옵워', 'God of War', 'Santa Monica Studio', 52800, 2, 1, 1, '2018-04-22', 0, 1, 0, 0, 'img_1920x_66dfe183100d14-00442157-76237792_682ef93ce89d8.jpg', 'img_1920x_66dfe183100d14-00442157-76237792_682ef93ce8c72.jpg', 'ss_6eccc970b5de2943546d93d319be1b5c0618f21b_682ef99534562.jpg', 'ss_3670ba72c7e3e9c3c3225547ef2c1053504e62b8_682ef99534869.jpg', 'ss_f1bff24d3967a21d303d95e11ed892e3d9113057_682ef99534cf0.jpg', 'ss_8db3de5b5d611e50945268848de2889e1ed4ba84_682ef99535071.jpg', '북유럽의 영역에 입장하세요', '두 번째 기회를 잡으세요', '공포스러운 생명체들이 존재하는<br>어둡고 자연적인 세계로 여정을 떠나세요', '잔혹한 물리 전투를 즐기세요', '올림푸스 신들을 향한 복수심을 뒤로 하고 크레토스는 이제 북유럽 신과 괴물의 땅에 살고 있습니다.<br>항상 생존을 위해 싸워야 하는 이 혹독하고 가차없는 세상에서, 그는 생존을 위해 싸우고… 아들에게도 그 방식을 가르쳐야 합니다.\r\n', '크레토스는 다시 아버지가 되었습니다. 아트레우스는 아버지에게 인정받기를 원하며, 그의 스승이자 보호자인 크레토스는<br>아들과 함께 위험한 세계를 탐험하는 동안 오랜 기간 자신의 존재를 정의한 분노를 통제하고 제어해야 합니다.\r\n', '대리석 기둥으로 장식된 올림푸스에서 바이킹 이전의 북유럽 전설에 나오는 숲, 산, 동굴은<br>다양한 생명체와 괴물, 그리고 신들이 거주하는 독특하고 새로운 지역입니다.\r\n', '플레이어에게 이전보다 더 가까이서 액션을 즐기게 해주는 어깨 너머 자유로운 카메라 시점은<br>God of War에서 크레토스가 상대할 북유럽의 생명체와의 격렬한 싸움을 비춰줍니다.<br>새로운 주 무기와 새 능력은 장르에 새로운 영역을 구축한 폭력의 충돌을 보여주면서도, God of War를 정의하는 주요 요소를 유지합니다.\r\n'),
(29, 7, '킹덤컴', 'Kingdom Come: Deliverance', 'Warhorse Studios', 30400, 2, 1, 1, '2018-02-13', 0, 0, 1, 35, '2118748_11xl_682efc025bd99.jpg', '2118748_xl_682efb57923e3.jpg', 'ss_01dea4f433b9dcf121a3120c6c36712dc136c63a_682efba510804.jpg', 'ss_610c1ce30e151a8e9550a9cf9119791e15d3c91a_682efba510b0f.jpg', 'ss_b9b014da63d552adbf4958d9ce6edab64ecfcbae_682efba511265.jpg', 'ss_b9dc4d4f75c513f4be466598f9ad1ba28d7b7501_682efba511a36.jpg', '거대하고 현실적인 오픈 월드', '비선형적인 스토리', '고난이도 전투', '역동적인 세계', '장엄한 성과, 드넓은 벌판, 아름다운 세계가 최고의 그래픽으로 렌더링됩니다.', '임무를 다양한 방법으로 완수하고, 당신이 한 선택의 결과를 마주하십시오.', '원거리, 잠입, 근거리. 사용할 무기를 고르고 무자비하지만 스릴 넘치는 전투에서 수십가지의 독특한 콤보를 사용해 보십시오.', '주변 사람들이 당신의 행동에 영향을 받습니다.<br>싸우고, 훔치고, 유혹하고, 위협하고, 설득하고, 뇌물을 주십시오. 모두 당신의 선택에 달렸습니다.'),
(30, 7, '언텔', 'Undertale', 'tobyfox', 10500, 1, 0, 1, '2015-09-15', 0, 1, 1, 20, 'undertale_xb1_682f010ee2f68.jpg', 'undertale_xb1_682f010ee318f.jpg', 'ss_b9018c41cea2bdfb150609bedfca99b16a5af02a_682f01773f34b.jpg', 'ss_edab41f7c9fa287b0d90ebfa3b9219fec6e1b3ed_682f01773f3e5.jpg', 'ss_a11393d4b437ca75c10521f6baf53fbba9006f0f_682f01773f45b.jpg', 'ss_9025a366676c26046b1d08e94ab1a73406aa11db_682f01773f4ae.jpg', '', '', '', '', 'Explore a rich RPG world full of strange and delightful characters where violence isn’t the only answer. ', 'Dance with a slime...pet a dog...whisper your favorite secret to a knight...or ignore all of that and rain destruction upon your foes.<br>The choices are yours—but are you determined enough to prevail?\r\n', '', ''),
(31, 8, '스포어', 'SPORE™', 'Maxis™', 22000, 0, 0, 1, '2008-12-19', 0, 1, 1, 60, '71K4yphLW4S._AC_UF894,1000_QL80__682f071493215.jpg', '71K4yphLW4S._AC_UF894,1000_QL80__682f06f7be2e8.jpg', '0000006443_682f0769c7447.jpg', '0000006447_682f0769c77de.jpg', '0000006439_682f0769c7b74.jpg', '0000006444_682f0769c7ec3.jpg', '미세한 세상에서 대우주까지,<br>여러분의 세상을 \'창조\'하세요', '다섯 단계를 통해 여러분의 생명체를 \'진화\'시키세요', '다른 플레이어의 은하계를 \'탐험\'하세요', '전 세계와 \'공유\'하세요', '조수의 아메바로 시작해 번화 문명이 되어 우주선을 타고 우주로 나가기까지. 모든 것은 여러분의 손 안에 있습니다.', '여러분이 재미로 해본 선택이 세대를 넘고, 결국 문명의 궁극적인 신념으로 남게 될 것입니다.', '여러분이 만든 생명체가 은하계를 다스릴까요? 아니면 여러분의 소중한 행성이 더 강력한 외계 종족에게 산산조각 날까요?', '여러분의 모든 작품이 다른 플레이어에게 공유되고, 반대로 생명체에게 쓰일 멋진 색상이나 방문하고 싶을 멋진 장소를 공유받게 됩니다.'),
(32, 3, '쿠키클리커', 'Cookie Clicker', 'Orteil', 5600, 2, 1, 1, '2013-08-08', 0, 1, 0, 0, 'Cookie Clicker_682f086903757.jpg', 'Cookie Clicker_682f086903ad0.jpg', 'ss_d80810a096e806bd1336ebf23fda645d7ca4d342_682f08ac4fa86.jpg', 'ss_100c7c8e0cb30fdfd3e71ddc8d93965be3e7d8eb_682f08ac4fceb.jpg', 'ss_1b5c377af5df8b29724754227b7af54dd6e05e33_682f08ac4ff5d.jpg', 'ss_16da4f3b093c4562b50a9c9bf2e2bec4732d2436_682f08ac5024e.jpg', '', '', '', '', 'Cookie Clicker는 어마어마한 양의 쿠키를 만드는 게임입니다.<br>이 목표를 달성하기 위해 친근한 할머니, 농장, 공장, 그리고 이계의 포털 같은 다양한 쿠키 제조자들을 모집할 것입니다.\r\n', '', '', ''),
(33, 4, '로보토미', 'Lobotomy Corporation', 'ProjectMoon', 26000, 2, 0, 1, '2018-04-09', 0, 0, 1, 20, '12174187_682f09adc7d08.jpg', '12174187_682f09adc7dc3.jpg', 'ss_7f8118a7b224505b397f481e8187fb647a3a42c6_682f09f1a00d2.jpg', 'ss_1ca2f5995f459084b023233f2fa47e315185ce4f_682f09f1a01c0.jpg', 'ss_d295f58d94c133fc702af1f12bacae8e7bd9383b_682f09f1a0253.jpg', 'ss_54183ee9d7dc3d125df090c2fb69bc32c8bc50bc_682f09f1a02e5.jpg', '당신이 상상할 수 없을 온갖 종류의 괴물들,<br>그리고 관리자', '“우리의 신기술은 인류를 구원할 것이다.”', '당신이 쉴새 없이 연구해야 할,<br>탐구해야 할 존재들.', '이것은 결코 타이쿤이 아닙니다.', 'Lobotomy Corporation은 괴물 관리 로그라이트 시뮬레이션 게임입니다.<br>여러분은 괴물들을 격리시키는 로보토미사의 관리자가 되어 다양한 종류의 괴물들을 관리하게 됩니다.<br>여러분은 직원들에게 명령을 시키고 그 결과를 지켜볼 수 있을 겁니다.\r\n', '게임의 배경이자 당신이 앞으로 머물게 될 로보토미 사는 독자적인 기술 개발을 통해 환상체들을 격리하고<br>그들로부터 무궁무진한 에너지를 뽑아내는 신에너지 기업체입니다.<br>여기까지는 외부에서 알려진 로보토미의 이미지이며, 실상이 어떤지에 대해서는 당신이 직접 입사하여 확인해보시기 바랍니다.', 'Lobotomy에 존재하는 괴물들, 우리는 이 존재들을 ‘환상체’ 라고 명명했습니다.<br>당신은 환상체로부터 최대한 많은 양의 에너지를 생성해야 되는 동시에 직원들을 위험에 빠뜨리지 않도록 노력해야 할 것입니다.<br>하지만 어떤 환상체에게 어떤 작업을 해야 할지 알기 위해서는 많은 시행착오들이 불가피하게 필요합니다.', '앞서 언급했듯 환상체들은 매우 조심스럽게 대해야 할 존재들입니다.<br>그들 중에 일부분은 스스로가 격리소에 갇혀 있는 것을 탐탁치 않게 생각할 지도 모르며 때때로는 실제로 탈출을 감행할 것입니다.<br>탈출한 환상체는 눈 앞의 모든 직원들을 공격하며 회사 시설을 파괴하려 합니다.\r\n'),
(34, 4, '라오루', 'Library Of Ruina', 'ProjectMoon', 31000, 2, 1, 1, '2021-08-11', 0, 0, 1, 10, 'MV5BM2QzY2M2YjUtMjIwYS00ODVjLTlhNDEtY2VlZjdiYzNhMzgwXkEyXkFqcGc@._V1__682f0b55459e9.jpg', 'MV5BM2QzY2M2YjUtMjIwYS00ODVjLTlhNDEtY2VlZjdiYzNhMzgwXkEyXkFqcGc@._V1__682f0b5545a90.jpg', 'ss_707fb2b0bbceecc4d4ea8517ebc709b69cca35fc_682f0c2f4b986.jpg', 'ss_c80e2ea36a79f73d87e9740f470054199a1f5e55_682f0c2f4bc49.jpg', 'ss_31224734740c90faf7e9d9986962c1133e0dd2c3_682f0c2f4bee4.jpg', 'ss_338843763e782212597ec2979c2ff496d5dc61d4_682f0c2f4c257.jpg', '부디 당신의 책을 찾으실 수 있기를', '도서관 배틀 시뮬레이션', '모든 것이 될 수 있는 \'책\'', '도시와 도서관의 이야기', '도서관의 주인이 되어 손님들을 맞이하세요. 사서들은 도서관을 위해 싸웁니다. 손님들과 사서와의 전투가 무대처럼 펼쳐집니다.<br>패배한 손님은 책이 되고, 도서관은 성장합니다. 좋은 책은 더 많은 비밀을 지닌 손님을 초대합니다.<br>책을 얻어가며 도시의 비밀을 파헤쳐가세요. 그리고 손에 넣으세요. 단 하나의 완벽한 책을.', '라이브러리 오브 루이나는 도서관 전투 시뮬레이션 게임입니다.<br>당신은 손님을 도서관에 초대하고 전투를 진행하여 손님에게서 이야기가 담긴 \'책\'을 얻을 수 있습니다.\r\n', '도서관에서 사망한 손님은 \'책\'이 됩니다. 책은 사서의 육체가 되기도, 도서관의 성장재료가 되기도, 전투에 쓰이는 카드가 되기도 합니다.<br>또한 \'책\'을 또다른 손님을 부르는 초대장의 재료로 사용할 수도 있습니다.', '라이브러리 오브 루이나에서는 로보토미 코퍼레이션의 결말에서 이어지는 앤젤라와 세피라, 롤랑의 이야기를 볼 수 있습니다.<br>또한 도서관이 위치한 거대한 도시의 곳곳에서 일어나는 다양한 사건들을 지켜볼 수도 있습니다.'),
(35, 4, '발할라', 'VA-11 Hall-A', 'Sukeban Games', 16000, 1, 0, 1, '2016-06-21', 0, 1, 0, 0, '9694705-va-11-hall-a-cyberpunk-bartender-action-windows-apps-front-cover_682f0d38a22df.jpg', '9694705-va-11-hall-a-cyberpunk-bartender-action-windows-apps-front-cover_682f0d1398e38.jpg', 'ss_200b468aaa011d8bf606e41831447013595927c3_682f0dc1d6818.jpg', 'ss_b9171d76f5972a2bfb940fc16d956b129f568977_682f0dc1d68e2.jpg', 'ss_934b151d3c10de64a54cb5d1d8f5c91c091d98f4_682f0dc1d6956.jpg', 'ss_be8a285f0fca33cb46944a8d2fce8d1014fcf10a_682f0dc1d69bc.jpg', '', '', '', '', 'Learn about daily life in the cyberpunk dystopia of Glitch City.\r\n', 'A branching storyline where your decisions do not depend on traditional choices, but through the drinks you prepare.\r\n', 'Visuals inspired by old Japanese adventure games for the PC-98, with a modern touch for an otherworldly experience.\r\n', 'Get to know your clients, their tastes, and prepare the drink that will change their lives.\r\n'),
(36, 4, '파라벨', '.45 PARABELLUM BLOODHOUND', 'Sukeban Games', 50000, 0, 0, 1, '2099-12-31', 1, 1, 0, 0, 'co8j7111p_682f1068ccaea.jpg', 'co8j7p_682f1068ccd23.jpg', 'ss_76fb3251afd6577604607671c914287eb48bc19d_682f10cc4c571.jpg', 'ss_a648e30a5350132c1c349d3e05a8ef067414e41a_682f10cc4c633.jpg', 'ss_879f98362ac6e51497cae4969f7fbb69284631d2_682f10cc4c713.jpg', 'ss_8308b237472476b49701fd22227c4d64f3c25763_682f10cc4c831.jpg', '', '', '', '', 'Experience the tightly designed \"Active Time Action\" battle system, suitable for both hardcore and vibes-based players alike.', 'Explore seven meticulously crafted, atmospheric stages with hand-placed encounters, dialogues, and riddles.\r\n', 'Enjoy detailed lo-fi visuals that enhance the texture of this rich cyberpunk world.\r\n', 'Immerse yourself in a gripping storyline waiting to be uncovered.\r\n'),
(37, 8, '심즈4', 'The Sims™ 4', 'Maxis', 38500, 2, 0, 1, '2014-09-02', 0, 1, 1, 100, 'TS4_Keyart_682f11d715538.webp', 'TS4_Keyart_682f11d715b8b.webp', 'ss_537683e5e29c2d6d02c64aa7321dcb26166f7d82_682f1248d0fb4.jpg', 'ss_b447d6436d2d00cd5e7c170e509b2246dfc879e8_682f1248d141e.jpg', 'ss_2fc938d99a1e87893852cb2d2113478190607941_682f1248d1710.jpg', 'ss_7d9baea1aedeeb41cb197a9e45a30f0b91b4baf9_682f1248d1bda.jpg', '', '', '', '', '상상력을 한껏 발휘하여 개성 넘치는 심즈 세계를 창조하세요! ', '심들부터 건물에 이르기까지 모든 부분을 살펴보고 취향에 맞게 꾸미세요.<br>심들의 외모, 행동, 의상을 선택하고, 그들이 날마다 어떻게 살아갈지 결정하세요.', '가족을 위해 완벽한 집을 설계해서 건설하고 좋아하는 가구와 장식물로 꾸미세요.<br>다른 동네에서 다른 심들을 만나고 그들의 삶에 대해서 알아보세요. ', '독특한 환경을 자랑하는 아름다운 마을들을 발견하며 자연스러운 모험을 계속하세요.<br>심들의 일상에서 펼쳐지는 좋은 일 나쁜 일을 모두 경험하고, 실생활에서 가져온 시나리오를 플레이할 때 어떤 일이 일어나는지 알아보세요!'),
(38, 8, '문명5', 'Sid Meier\'s Civilization® V', 'Firaxis Games', 32000, 2, 1, 1, '2010-09-24', 0, 0, 1, 75, '4c8cb9b614bd99032d01aa6d93f174a0_682f153ae0fca.png', '4c8cb9b614bd99032d01aa6d93f174a0_682f153ae10f5.png', 'ss_7082faf1b0941ddbc4ba9dab5807a9b5e77d72f9_682f15b828eb2.jpg', 'ss_5dfcd65b611b35a9dc126335dca2d48ef8180106_682f15b82928a.jpg', 'ss_aa383406a5f2979598b543d8f272d3ac145e357a_682f15b829505.jpg', 'ss_e6f9ef54f06ffebc9445d8b29d8d2054fa3185d4_682f15b8298a4.jpg', 'INVITING PRESENTATION', 'BELIEVABLE WORLD', 'COMMUNITY & MULTIPLAYER', 'WIDE SYSTEM COMPATIBILITY', 'Jump right in and play at your own pace with an intuitive interface that eases new players into the game.<br>Veterans will appreciate the depth, detail and control that are highlights of the series.', 'Ultra realistic graphics showcase lush landscapes for you to explore, battle over and claim as your own.', 'Compete with players all over the world or locally in LAN matches, mod* the game in unprecedented ways,<br>and install mods directly from an in-game community hub without ever leaving the game.', 'Civilization V operates on many different systems, from high end desktops to many laptops.'),
(39, 8, '캐피탈리즘 호!', 'Capitalism 2', 'Enlight', 10500, 0, 0, 1, '2015-03-12', 0, 1, 0, 0, 'co2l61_682f1863a71d8.jpg', 'co2l61_682f1863a746d.jpg', 'ss_c1768738825a7975129a0948525b0e174e87f076_682f1863a7653.jpg', 'ss_7d8d83de5c8f269aff26cb56f20ffd8d91f73ac0_682f1863a7a84.jpg', 'ss_1b742d5371c8a628963490deef376336f482ad81_682f1863a7d63.jpg', 'ss_62b287f466693edb110710f3ac68a4c1f5d1fea2_682f1863a8096.jpg', '', '', '', '', 'Make critical business decisions in all areas including retail, manufacturing, marketing, research, agriculture, mining, real estate development and more\r\n', 'Choose from over 60 product types to manufacture and market\r\n', 'Hire and fire upper management positions such as Chief Operating Officer, Chief Marketing Officer, and Chief Technical Officer\r\n', 'Expand your corporation into a true conglomerate; get ink on your fingers and take to the airwaves with your newspaper publishers, TV, and radio stations\r\n'),
(40, 1, '라오어2', '팡야 : The Last of Us™ Part II', 'Naughty Dog LLC', 52800, 2, 1, 1, '2025-05-22', 0, 0, 1, 60, 'the-last-of-us-2-key-art-ellie-logo_682f2aa3115fd.webp', 'il_570xN.4799539617_ipy8_682f2aa3118a1.webp', 'ss_0597b93e5e3d50cf6bd64bc8814386cd65f03410_682f2de2c0717.jpg', 'ss_d0138412577f8f37d885d9cfa6753951111040dc_682f2de2c08c0.jpg', 'ss_96a6281cea2e9b76b56af8a13e7cb2b59efd8b5c_682f2de2c0a57.jpg', 'ss_05a44fda9f63327b76ec59a561b375ef64d9f7d3_682f2de2c0b80.jpg', '', '', '', '', '', '', '', ''),
(41, 4, '액자뒤', 'Behind the Frame', 'Silver Lining Studio', 14500, 2, 1, 1, '2021-08-25', 0, 1, 0, 0, '1qD4AIxmhBhOWQJRlPnb6gsI_682f3191b0913.avif', '1qD4AIxmhBhOWQJRlPnb6gsI_682f3191b0b67.avif', 'ss_c8a72d7446556b36fd92b4e59d341377c67cee02_682f31e12f002.jpg', 'ss_d4ceb6ddccfd4ca9cbdecd3f09a2b02c8be0c2b1_682f31e12f386.jpg', 'ss_56b0a493551b421c77400d6c5a4207b213eeab19_682f31e12f62e.jpg', 'ss_38d78f4c13dbb7a5bf8c8fc416a08edcaadb39fd_682f31e12f910.jpg', '', '', '', '', 'Behind the Frame은 마지막 갤러리 출품작을 완성하는 이야기를 다룬 생생한 인터랙티브 픽션입니다.\r\n', '편안하고 풍부한 경험을 원하시는 속도로도 즐길 수 있습니다.<br>눈부시게 빛나는 색상, 손으로 만들어 낸 애니메이션, 감미로운 사운드트랙으로 가득 찬 파노라마식 세계에 빠져보세요.\r\n', '열정적인 예술가인 당신은 마지막 그림에 빠져 있던 색깔을 찾기 위해 여정을 떠납니다.<br>잠깐 커피를 마시고 아침 식사를 하는 것도 나쁘지 않겠죠.<br>그림의 세계는 보이는 것보다 더 많은 것을 가지고 있습니다. 모든 그림에는 전해 줄 이야기가 있기 때문입니다.\r\n', ''),
(42, 6, '역재123', '역전재판 123 나루호도 셀렉션', 'CAPCOM Co., Ltd.', 34800, 2, 1, 1, '2019-04-10', 0, 1, 0, 0, '4jG0IkzyqifQra_zEB69QaUqkpSh4q6EAyOQhIG09Rfu4JZrZUXA4Ld5S4nreZQ5ghX-a1IBMcZgRa0_SjT_aaaas2RKpsSHlfkwYJVaUma9KTpSy8NE7-ZuWLyQemEtcpLK0RJ46-T8d6RLr8hubS0tIQ_682f35579a051.jpg', '4jG0IkzyqifQra_zEB69QaUqkpSh4q6EAyOQhIG09Rfu4JZrZUXA4Ld5S4nreZQ5ghX-a1IBMcZgRa0_SjT_aaaas2RKpsSHlfkwYJVaUma9KTpSy8NE7-ZuWLyQemEtcpLK0RJ46-T8d6RLr8hubS0tIQ_682f35579a123.jpg', 'ss_b7e6e92dd87430750fb84ae3fede6630143f95ef_682f33bce463a.jpg', 'ss_9982567dc0b39bedd1f8c31ecc9762a87abc54a3_682f33bce47af.jpg', 'ss_ad8b9bd29d21b19735b272cba727dc35196edf82_682f33bce48c7.jpg', 'ss_ea34a5a4aa366734fadfd6a3972d77d445b492b0_682f33bce4a11.jpg', '', '', '', '', '플레이어는 변호사 \"나루호도 류이치\"가 되어 억울한 죄를 추궁받는 의뢰인을 위해 재판에 도전한다.', '리즈의 원점이 되는 「역전재판 소생하는 역전」「역전재판 2」「역전재판 3」의 세 작품, 전 14화를 그래픽을 파워업해 1개에 수록.<br>모든 이야기를 마지막까지 지켜볼 때 숨겨진 최후의 진실에 다다른다.', '', ''),
(43, 5, '잇테익스투', 'It Takes Two', 'Hazelight Studios', 44000, 2, 1, 1, '2025-05-22', 0, 1, 1, 30, 'EGS_ItTakesTwo_Hazelight_S2_1200x1600-5c82de2d2e21a841dd06ec27e082777e_1200x1600-5c82de2d2e21a841dd06ec27e082777e_682f3730117a5.jpg', 'EGS_ItTakesTwo_Hazelight_S2_1200x1600-5c82de2d2e21a841dd06ec27e082777e_1200x1600-5c82de2d2e21a841dd06ec27e082777e_682f37301197c.jpg', 'ss_a15164ddd357ab3c0b2aff575a6b215b2d91b406_682f373011aeb.jpg', 'ss_fdac523e3ea4d2f32a44449bb8c224857563bd7d_682f373011edd.jpg', 'ss_6ce2d50261a94284c72164e2d6d3721fe2f00013_682f3730120c5.jpg', 'ss_3e59753eefaba9a7704a18e902b48e8d38e95e0b_682f373012613.jpg', '완벽한 협동 플레이', '유쾌하고 획기적인 게임 플레이', '누구나 공감하는 관계에 관한 이야기', '', '친구가 무료로 참가할 수 있게 Remote Play Together로 초대하고, 둘만을 위해 마련된 짜릿한 모험을 경험해보세요.<br>로컬 협동이나 화면 분할 온라인 협동 중에서 선택하고, 힘을 합쳐야만 앞으로 나아갈 수 있는 변화무쌍한 도전을 헤쳐나가세요.', '진공 청소기의 난동부터 자상한 사랑의 전문가에 이르기까지, 과연 여러분은 다음에 누구를 상대하게 될까요?<br>장르를 넘나드는 도전과 모든 레벨에서 익힐 수 있는 새로운 캐릭터 능력으로 채워진 이 게임에서는,<br>상호 작용 스토리텔링의 경계를 넘어서는 이야기 전개와 게임 플레이가 은유적으로 결합되는 경험을 선사합니다.', '함께하는 도전 속에서 감동과 진심이 담긴 이야기가 서서히 드러납니다. 코디와 메이가 서로의 차이점을 극복할 수 있게 도와주세요.<br>낯설지만 사랑스러운 다양한 캐릭터를 만나보세요. 힘을 합쳐 여러분이 함께 소중히 기억할 모험을 떠나세요!', ''),
(44, 5, '포탈2', 'Portal 2', 'Valve', 11000, 2, 0, 1, '2011-04-29', 0, 1, 1, 80, '10837695_682f39ea2ff51.jpg', '10837695_682f39ea301e3.jpg', 'ss_f3f6787d74739d3b2ec8a484b5c994b3d31ef325_682f39ea303e7.jpg', 'ss_6a4f5afdaa98402de9cf0b59fed27bab3256a6f4_682f39ea30a3e.jpg', 'ss_0cdd90fafc160b52d08b303d205f9fd4e83cf164_682f39ea31036.jpg', 'ss_3d13161104a04603a0524536770c5f74626db4c0_682f39ea31209.jpg', '완벽한 2인 협동 게임', '더욱 발전한 물리 엔진', '대서사시의 속편', '독창적인 음악', '새로운 협동 플레이 모드는 별도의 캠페인과 독특한 스토리, 실험실과 함께 2명의 새로운 플레이어 캐릭터를 선보입니다. <br>이 새로운 모드는 플레이어들이 포털에 대해 알고 있다고 생각하던 기존의 모든 것을 재고하게끔 합니다.<br>협동적으로 행동하는 것만으로는 충분치 않습니다. 오로지 협동적으로 생각해야만 실험을 성공적으로 통과할 수 있습니다.', '더 거대한 범위의 흥미로운 도전을 창조할 수 있게 하지만, 게임 자체에 부담이 가지는 않습니다.', '오리지널 포털은 전 세계 30개 이상의 매체가 선정한 \'2007년 올해의 게임\'의 반열에 올랐습니다.', ''),
(45, 5, '리오레2', 'Risk of Rain 2', 'Hopoo Games', 26600, 2, 1, 1, '2020-08-11', 0, 1, 1, 67, 'MV5BYzYzOTg1MTQtNGY4ZC00M2M1LTlkZGYtZDY1MTIxZjBmZmU4XkEyXkFqcGc@._V1__682f3b1f9ee90.jpg', 'MV5BYzYzOTg1MTQtNGY4ZC00M2M1LTlkZGYtZDY1MTIxZjBmZmU4XkEyXkFqcGc@._V1__682f3b1f9ef33.jpg', 'ss_2bb49071317f7b241a527cf6e7aabd2cb6af055b_682f3b1f9efa6.jpg', 'ss_328d6fcb223f848c2a1047bb86702c4175d92317_682f3b1f9f086.jpg', 'ss_0377ff24b4d60db6a38ddc0824b7f308890b9231_682f3b1f9f144.jpg', 'ss_85548e86c50ff654c6a49235ea686a956f8ee9ec_682f3b1f9f209.jpg', '외계 행성에서 살아남기', '강력한 새로운 아이템 발견', '새로운 플레이 방법을 잠금 해제', '혼자 또는 협동으로 플레이', '10가지가 넘는 수제작된 배경이 기다리고 있습니다, 각각 공략이 어려운 몬스터들이 가득하고 거대한 보스들이 여러분의 생존을 방해합니다.<br>최종 보스를 향해 싸우며 전진하고 탈출하거나, 남아서 계속 싸우며 얼마나 오래 생존할 수 있는지 확인하세요.<br>고유한 스케일링 시스템으로 여러분과 적들이 게임을 진행하는 동안 무제한으로 계속 강해집니다.\r\n', '110가지 이상의 아이템들이 매번 다른 경험과 새로운 도전을 보장합니다.<br>아이템을 많이 수집할수록, 효과들을 섞어 사용할수록, 더욱 놀라운 복합 효과가 일어날 수 있습니다.<br>아이템을 많이 확인할수록, 더 많은 구전 설화(및 전략)을 기록을 통해 알아낼 수 있습니다.\r\n', '11명의 플레이어블 생존자들을 잠금 해제하십시오. 각각 고유한 전투 스타일과 다양한 스킬을 마스터할 수 있습니다.<br>유물의 비밀을 알아내어 아군 공격, 무작위 생존자 생성, 아이템 선택 등등의 게임플레이 변조기를 켜고 끌 수 있습니다.<br>스테이지, 적, 아이템이 무작위로 생성되므로 플레이할 때마다 다른 경험을 할 수 있습니다.\r\n', '혼자 플레이하거나, 또는 온라인 협동으로 최대 세 명의 친구들과 플레이하거나, 다면적 도전의 순환식 도전에서 경쟁하세요.<br>캡틴 및 MUL-T 같은 새로운 생존자가 엔지니어, 헌트리스, 그리고 코만도 같은 클래식 생존자들과 함께합니다.\r\n'),
(46, 5, 'wwh', 'We Were Here', 'Total Mayhem Games', 0, 0, 0, 1, '2017-02-04', 0, 0, 0, 0, '1636289155_592102-we-were-here-xbox-one-front-cover_682f3e17d20d3.jpg', '1636289155_592102-we-were-here-xbox-one-front-cover_682f3e17d2378.jpg', 'ss_6163b37008e37d7bc29866a8f19a52cf22f1d015_682f3e17d2582.jpg', 'ss_a38967c13564b20760856d936a7443e7f10b0317_682f3e17d27ec.jpg', 'ss_aca8a539fb47502bd88a30abf664cb5f5d11dd5d_682f3e17d2b95.jpg', 'ss_fd27e1213fcfb35f29275bfa859b9fd154189109_682f3e17d2e36.jpg', '', '', '', '', 'Atmospheric thriller setting that will keep you on the edge of your seat.\r\n', 'Overcome challenging puzzles by working together - each player has a completely different game experience.\r\n', 'Explore intriguing environments and search for clues in a fictional castle inspired by Castle Rock, Antarctica.\r\n', 'Inspired by games such as: Myst, Amnesia: The Dark Descent, and real-life escape rooms.\r\n'),
(47, 6, '페즈', 'FEZ', 'Polytron Corporation', 10500, 2, 1, 1, '2025-05-23', 0, 1, 1, 50, '6063634-fez-windows-front-cover_682f3ef73fa78.jpg', '6063634-fez-windows-front-cover_682f3ef73fb32.jpg', 'ss_f9ecd9ef063e380c38350bf97a234ac8fb20e738_682f3ef73fb89.jpg', 'ss_c433accea78008474b03f027bc4aacec765f968f_682f3ef73fc07.jpg', 'ss_a187b036f7bf387b9d2137403d915320bef7c55b_682f3ef73fcbd.jpg', 'ss_9fad5e712bd92d2d04e13ae48d7561f598cb14f5_682f3ef73fd61.jpg', '', '', '', '', '2D 세계의 생명체 Gomez 앞에 어느 날 갑자기 신비한 3D 세계가 모습을 드러냅니다. 이로 인해 Gomez는 시간과 공간의 끝을 향하는 긴 여행을 떠나게 됩니다.', '여러분의 능력을 발휘하여 고전적인 4방향 2D 세계에서 3D 건물을 탐험하십시오.', '비밀과 고난, 숨겨진 보물이 가득한 아름답고 고요한 느낌의 열린 세계로 모험을 떠나 과거의 비밀을 밝히고 현실과 인식에 대한 진실을 알아내십시오.<br>사고방식을 바꾸고 다른 방법으로 세상을 들여다보십시오..', ''),
(48, 3, '식좀', 'Plants vs. Zombies', 'PopCap Games, Inc.', 5000, 2, 1, 1, '2009-05-06', 0, 1, 0, 0, 'b8fc553fa1232bc72b724e64c67c4e1b_682f4199ec06e.jpg', 'b8fc553fa1232bc72b724e64c67c4e1b_682f4199ec30f.jpg', '0000008156_682f4199ec504.jpg', '0000008160_682f4199ec965.jpg', '0000008152_682f4199ecd03.jpg', '0000008153_682f4199ed039.jpg', '', '', '', '', 'Bejeweled와 Peggle의 제작사인 PopCap의 신개념 액션-전략 게임!', '좀비들이 당신의 집을 침략하려는 마당에, 그에 대한 유일한 방어책은 여러분의 식물 군단입니다!<br>Peashooter와 Cherry Bomb 같은 좀비 패는 식물들로 무장하세요. 재빠르게 판단하고 식물을 심어 몰려오는 좀비를 막아내세요.', '오싹한 안개, 지는 태양, 수영장 등의 방해 요소들과 게임에 전념할 수 있게 만드는 5개의 모드가 새로운 도전 요소로 추가됐습니다.<br>고로 재미는 절대 죽지 않을 것입니다!', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 테이블의 덤프 데이터 `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(0, '장르선택'),
(1, '액션'),
(2, '어드벤처'),
(3, '캐주얼'),
(4, '인디'),
(5, '협동'),
(6, '퍼즐'),
(7, 'RPG'),
(8, '시뮬레이션');

-- --------------------------------------------------------

--
-- 테이블 구조 `juso`
--

CREATE TABLE `juso` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `sm` tinyint(4) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `juso` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 테이블의 덤프 데이터 `juso`
--

INSERT INTO `juso` (`id`, `name`, `tel`, `sm`, `birthday`, `juso`) VALUES
(1, '최민기', '01627516250', 0, '1990-01-01', '서울 노원구 초안산로 12 인덕대학교 1'),
(2, '노준국', '01192318426', 1, '1990-01-02', '서울 노원구 초안산로 12 인덕대학교 2'),
(3, '배인정', '01091419758', 0, '1990-01-03', '서울 노원구 초안산로 12 인덕대학교 3'),
(4, '윤수진', '01091315099', 0, '1990-01-04', '서울 노원구 초안산로 12 인덕대학교 4'),
(5, '김민주', '01012715951', 1, '1990-01-05', '서울 노원구 초안산로 12 인덕대학교 5'),
(6, '고향에', '01164712495', 0, '1990-01-06', '서울 노원구 초안산로 12 인덕대학교 6'),
(7, '이창기', '01094567737', 0, '1990-01-07', '서울 노원구 초안산로 12 인덕대학교 7'),
(8, '강범조', '01197515356', 0, '1990-01-08', '서울 노원구 초안산로 12 인덕대학교 8'),
(9, '임상호', '01076212041', 1, '1990-01-09', '서울 노원구 초안산로 12 인덕대학교 9'),
(10, '김경진', '01196616064', 0, '1990-01-10', '서울 노원구 초안산로 12 인덕대학교 10'),
(11, '양지민', '01085916932', 0, '1990-01-11', '서울 노원구 초안산로 12 인덕대학교 11'),
(12, '김철규', '01064517732', 0, '1990-01-12', '서울 노원구 초안산로 12 인덕대학교 12'),
(13, '이재진', '01066725207', 0, '1990-01-13', '서울 노원구 초안산로 12 인덕대학교 13'),
(14, '김인기', '01045825553', 1, '1990-01-14', '서울 노원구 초안산로 12 인덕대학교 14'),
(15, '황호하', '01094529069', 0, '1990-01-15', '서울 노원구 초안산로 12 인덕대학교 15'),
(16, '원미현', '01697323309', 0, '1990-01-16', '서울 노원구 초안산로 12 인덕대학교 16'),
(17, '김성현', '01077524586', 0, '1990-01-17', '서울 노원구 초안산로 12 인덕대학교 17'),
(18, '윤태양', '01044624402', 0, '1990-01-18', '서울 노원구 초안산로 12 인덕대학교 18'),
(19, '손영미', '01063021586', 1, '1990-01-19', '서울 노원구 초안산로 12 인덕대학교 19'),
(20, '서찬국', '01029725437', 0, '1990-01-20', '서울 노원구 초안산로 12 인덕대학교 20'),
(21, '최지호', '01095829293', 0, '1990-01-21', '서울 노원구 초안산로 12 인덕대학교 21'),
(22, '현오석', '01045725203', 0, '1990-01-22', '서울 노원구 초안산로 12 인덕대학교 22'),
(23, '고구진', '01039539565', 0, '1990-01-23', '서울 노원구 초안산로 12 인덕대학교 23'),
(24, '임양진', '01049431735', 0, '1990-01-24', '서울 노원구 초안산로 12 인덕대학교 24'),
(25, '박잔형', '01028732059', 0, '1990-01-25', '서울 노원구 초안산로 12 인덕대학교 25'),
(26, '고맹진', '01017331347', 1, '1990-01-26', '서울 노원구 초안산로 12 인덕대학교 26'),
(27, '이미진', '01032434656', 0, '1990-01-27', '서울 노원구 초안산로 12 인덕대학교 27'),
(28, '박신양', '01032633479', 0, '1990-01-28', '서울 노원구 초안산로 12 인덕대학교 28'),
(29, '이부성', '01022533028', 0, '1990-01-29', '서울 노원구 초안산로 12 인덕대학교 29'),
(30, '박조형', '01034634503', 0, '1990-01-30', '서울 노원구 초안산로 12 인덕대학교 30'),
(31, '김당진', '01022144844', 0, '1990-01-31', '서울 노원구 초안산로 12 인덕대학교 31'),
(32, '임조철', '01063146720', 0, '1990-02-01', '서울 노원구 초안산로 12 인덕대학교 32'),
(33, '최미선', '01023744540', 0, '1990-02-02', '서울 노원구 초안산로 12 인덕대학교 33'),
(34, '정해솔', '01057443220', 1, '1990-02-03', '서울 노원구 초안산로 12 인덕대학교 34'),
(35, '이양석', '01045946853', 0, '1990-02-04', '서울 노원구 초안산로 12 인덕대학교 35'),
(36, '조진현', '01074255035', 0, '1990-02-05', '서울 노원구 초안산로 12 인덕대학교 36'),
(37, '김호석', '01015645583', 0, '1990-02-06', '서울 노원구 초안산로 12 인덕대학교 37'),
(38, '김호식', '01014176818', 0, '1990-02-07', '서울 노원구 초안산로 12 인덕대학교 38'),
(39, '김국진', '01022785917', 0, '1990-02-08', '서울 노원구 초안산로 12 인덕대학교 39'),
(40, '박미희', '01078379430', 0, '1990-02-09', '서울 노원구 초안산로 12 인덕대학교 40'),
(41, '권해미', '010145 7190', 0, '1990-02-10', '서울 노원구 초안산로 12 인덕대학교 41'),
(42, '이성민', '01002544347', 0, '1990-02-11', '서울 노원구 초안산로 12 인덕대학교 42'),
(43, '정다슬', '01036347019', 1, '1990-02-12', '서울 노원구 초안산로 12 인덕대학교 43'),
(44, '육이호', '01092343917', 0, '1990-02-13', '서울 노원구 초안산로 12 인덕대학교 44'),
(45, '한재우', '01193247558', 0, '1990-02-14', '서울 노원구 초안산로 12 인덕대학교 45'),
(46, '정승국', '01023345788', 0, '1990-02-15', '서울 노원구 초안산로 12 인덕대학교 46'),
(47, '양호승', '01083945545', 0, '1990-02-16', '서울 노원구 초안산로 12 인덕대학교 47'),
(48, '윤상현', '01034655978', 0, '1990-02-17', '서울 노원구 초안산로 12 인덕대학교 48'),
(49, '최미문', '01024365634', 0, '1990-02-18', '서울 노원구 초안산로 12 인덕대학교 49'),
(50, '시국진', '01021243572', 0, '1990-02-19', '서울 노원구 초안산로 12 인덕대학교 50'),
(60, '안이령', '01039567785', 1, '1990-11-12', '서울 노원구 초안산로 12 인덕대학교 0');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `zip` varchar(5) DEFAULT NULL,
  `juso` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gubun` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`id`, `uid`, `pwd`, `name`, `tel`, `zip`, `juso`, `email`, `birthday`, `gubun`) VALUES
(6, 'user01', '1234', '박민재', '01012345678', '01100', '서울 강남구 테헤란로 1', 'minsu01@test.com', '1990-01-15', 0),
(7, 'user02', '1234', '이서준', '01023456789', '02200', '서울 강북구 솔샘로 5', 'seojoon02@test.com', '1991-02-18', 0),
(8, 'user03', '1234', '박지우', '01034567890', '03300', '부산 해운대구 센텀로 15', 'jiwoo03@test.com', '1992-03-10', 0),
(9, 'user04', '1234', '최윤아', '01045678901', '04400', '대구 수성구 달구벌대로 200', 'yuna04@test.com', '1993-04-12', 0),
(10, 'user05', '1234', '정도윤', '01056789012', '05500', '인천 연수구 송도동 300', 'doyoon05@test.com', '1994-05-22', 0),
(11, 'user06', '1234', '한지민', '01067890123', '06600', '광주 북구 운암동 101', 'jimin06@test.com', '1990-06-30', 0),
(12, 'user07', '1234', '서하율', '01078901234', '07700', '대전 서구 둔산동 99', 'hayul07@test.com', '1989-07-11', 0),
(13, 'user08', '1234', '오예린', '01089012345', '08800', '울산 남구 삼산로 55', 'yerin08@test.com', '1988-08-19', 0),
(14, 'user09', '1234', '장현우', '01090123456', '09900', '수원 영통구 광교중앙로 30', 'hyunwoo09@test.com', '1995-09-09', 0),
(15, 'user10', '1234', '백서준', '01011223344', '10100', '창원 의창구 대원로 22', 'seojoon10@test.com', '1996-10-10', 0),
(16, 'user11', '1234', '조하람', '01022334455', '11111', '서울 서초구 반포로 50', 'haram11@test.com', '1990-11-11', 1),
(17, 'user12', '1234', '노유진', '01033445566', '12222', '서울 마포구 월드컵북로 10', 'yujin12@test.com', '1991-12-21', 0),
(18, 'user13', '1234', '신태윤', '01044556677', '13333', '부산 남구 용호로 88', 'taeyoon13@test.com', '1992-01-05', 0),
(19, 'user14', '1234', '문지환', '01055667788', '14444', '대전 중구 중앙로 99', 'jihwan14@test.com', '1993-02-02', 0),
(20, 'user15', '1234', '김예준', '01066778899', '15555', '인천 미추홀구 경원대로 60', 'yejoon15@test.com', '1994-03-03', 0),
(21, 'user16', '1234', '윤다온', '01077889900', '16666', '대구 북구 대학로 7', 'daon16@test.com', '1995-04-04', 0),
(22, 'user17', '1234', '이준혁', '01088990011', '17777', '광주 동구 서석로 33', 'joon17@test.com', '1996-05-05', 0),
(23, 'user18', '1234', '정시아', '01099001122', '18888', '서울 동작구 상도로 123', 'shia18@test.com', '1997-06-06', 0),
(24, 'user19', '1234', '강도현', '01010111213', '19999', '부산 기장군 해운대로 50', 'dohyun19@test.com', '1998-07-07', 0),
(25, 'user20', '1234', '배지호', '01020212223', '20000', '서울 노원구 동일로 900', 'jiho20@test.com', '1999-08-08', 0),
(26, 'user21', '1234', '김소연', '01031323334', '21111', '서울 강동구 천호대로 888', 'soyeon21@test.com', '1990-09-09', 0),
(27, 'user22', '1234', '박건우', '01042424344', '22222', '서울 성북구 동소문로 22', 'gunwoo22@test.com', '1991-10-10', 0),
(28, 'user23', '1234', '이채은', '01053535354', '23333', '전주 완산구 전라대로 60', 'chaeun23@test.com', '1992-11-11', 0),
(29, 'user24', '1234', '조나영', '01064646364', '24444', '청주 흥덕구 복대동 123', 'nayoung24@test.com', '1993-12-12', 0),
(30, 'user25', '1234', '최현서', '01075757374', '25555', '서울 금천구 시흥대로 45', 'hyunseo25@test.com', '1994-01-01', 0),
(31, 'user26', '1234', '장유찬', '01086868384', '26666', '성남 수정구 산성대로 12', 'yuchan26@test.com', '1995-02-02', 0),
(32, 'user27', '1234', '허지민', '01097979394', '27777', '서울 관악구 남부순환로 100', 'jimin27@test.com', '1996-03-03', 0),
(33, 'user28', '1234', '오태민', '01008080304', '28888', '부천 원미구 부천로 90', 'taemin28@test.com', '1997-04-04', 0),
(34, 'user29', '1234', '남하은', '01019191314', '29999', '서울 은평구 진관동 55', 'haeun29@test.com', '1998-05-05', 0),
(35, 'user30', '1234', '유시우', '01029292324', '30000', '부산 동래구 온천장로 30', 'siwoo30@test.com', '1999-06-06', 0),
(36, 'user31', '1234', '한도윤', '01039393334', '31111', '서울 종로구 종로 1길', 'doyoon31@test.com', '1990-07-07', 0),
(37, 'user32', '1234', '임예린', '01049494344', '32222', '서울 용산구 청파로 55', 'yerin32@test.com', '1991-08-08', 0),
(38, 'user33', '1234', '강주원', '01059595354', '33333', '서울 중랑구 봉화산로 33', 'juwon33@test.com', '1992-09-09', 0),
(39, 'user34', '1234', '백아린', '01069696364', '34444', '서울 동대문구 왕산로 80', 'arin34@test.com', '1993-10-10', 0),
(40, 'user35', '1234', '서현진', '01079797374', '35555', '대전 유성구 대학로 25', 'hyunjin35@test.com', '1994-11-11', 0),
(41, 'user36', '1234', '문하준', '01089898384', '36666', '광주 광산구 수완로 10', 'hajoon36@test.com', '1995-12-12', 0),
(42, 'user37', '1234', '이소율', '01099999394', '37777', '대구 남구 중앙대로 300', 'soyun37@test.com', '1996-01-01', 0),
(43, 'user38', '1234', '조도하', '01010102304', '38888', '부산 북구 구포로 12', 'doha38@test.com', '1997-02-02', 0),
(44, 'user39', '1234', '노지우', '01020203314', '39999', '인천 계양구 계양대로 66', 'jiwoo39@test.com', '1998-03-03', 0),
(45, 'user40', '1234', '이재현', '01030304324', '40000', '서울 강서구 공항대로 123', 'jaehyun40@test.com', '1999-04-04', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `opt`
--

CREATE TABLE `opt` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 테이블의 덤프 데이터 `opt`
--

INSERT INTO `opt` (`id`, `name`) VALUES
(1, '플랫폼'),
(2, '언어');

-- --------------------------------------------------------

--
-- 테이블 구조 `opts`
--

CREATE TABLE `opts` (
  `id` int(11) NOT NULL,
  `opt_id` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 테이블의 덤프 데이터 `opts`
--

INSERT INTO `opts` (`id`, `opt_id`, `name`) VALUES
(1, 1, 'PC'),
(2, 1, 'PS4'),
(10, 2, '한국어'),
(11, 2, '영어'),
(15, 1, 'PS5'),
(16, 1, 'Xbox One'),
(17, 1, 'Xbox Series X|S'),
(18, 1, 'Nintendo Switch'),
(19, 1, 'Nintendo Switch 2'),
(20, 2, '일본어');

-- --------------------------------------------------------

--
-- 테이블 구조 `sj`
--

CREATE TABLE `sj` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `kor` int(11) DEFAULT NULL,
  `eng` int(11) DEFAULT NULL,
  `mat` int(11) DEFAULT NULL,
  `hap` int(11) DEFAULT NULL,
  `avg` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 테이블의 덤프 데이터 `sj`
--

INSERT INTO `sj` (`id`, `name`, `kor`, `eng`, `mat`, `hap`, `avg`) VALUES
(1, '홍길동', 90, 86, 92, 268, 89.3),
(2, '전미재', 80, 83, 95, 258, 86),
(3, '김양호', 86, 91, 86, 263, 87.7),
(4, '문성진', 90, 87, 69, 246, 82),
(5, '김자완', 95, 86, 93, 274, 91.3),
(6, '오당식', 95, 84, 95, 274, 91.3),
(7, '조성훈', 92, 86, 95, 273, 91),
(8, '박장우', 84, 83, 85, 252, 84),
(9, '지송범', 80, 83, 84, 247, 82.3),
(10, '최미도', 75, 80, 86, 241, 80.3),
(11, '송국영', 84, 84, 95, 263, 87.7),
(12, '염진범', 80, 84, 90, 254, 84.7),
(13, '정아아', 75, 80, 75, 230, 76.7),
(14, '이고석', 79, 82, 83, 244, 81.3),
(15, '심안혜', 83, 83, 89, 255, 85),
(16, '김상민', 85, 85, 91, 261, 87),
(17, '박명수', 93, 83, 95, 271, 90.3),
(18, '김유관', 90, 83, 93, 266, 88.7),
(19, '진수나', 90, 83, 95, 268, 89.3),
(20, '윤정경', 75, 80, 77, 232, 77.3),
(21, '안현철', 82, 82, 87, 251, 83.7),
(22, '민종조', 91, 88, 95, 274, 91.3),
(23, '원우철', 83, 81, 85, 249, 83),
(24, '박규수', 75, 80, 62, 217, 72.3),
(25, '이세철', 80, 83, 87, 250, 83.3),
(26, '곽참만', 82, 83, 89, 254, 84.7),
(27, '한양희', 79, 83, 80, 242, 80.7),
(28, '구박영', 93, 85, 95, 273, 91),
(29, '김사형', 81, 82, 74, 237, 79),
(30, '이상민', 82, 82, 91, 255, 85),
(31, '강안기', 90, 87, 95, 272, 90.7),
(32, '김장혜', 82, 81, 90, 253, 84.3),
(33, '김정철', 82, 83, 93, 258, 86),
(34, '유요림', 94, 86, 76, 256, 85.3),
(35, '박미기', 90, 84, 95, 269, 89.7),
(36, '김양두', 75, 80, 83, 238, 79.3),
(37, '박상진', 84, 83, 91, 258, 86),
(38, '현잔철', 80, 83, 76, 239, 79.7),
(39, '김진기', 75, 80, 66, 221, 73.7),
(40, '도하진', 93, 84, 95, 272, 90.7),
(41, '윤양국', 80, 82, 70, 232, 77.3),
(42, '김장섭', 80, 82, 91, 253, 84.3),
(43, '구기민', 82, 83, 95, 260, 86.7),
(44, '홍자원', 84, 84, 93, 261, 87),
(45, '오정혜', 92, 83, 87, 262, 87.3),
(46, '김다성', 90, 91, 93, 274, 91.3),
(47, '박정훈', 88, 90, 69, 247, 82.3),
(48, '김오정', 86, 83, 95, 264, 88),
(49, '박청진', 97, 89, 95, 281, 93.7),
(50, '양강현', 90, 85, 79, 254, 84.7),
(53, '박민재', 100, 100, 100, 300, 100);

-- --------------------------------------------------------

--
-- 테이블 구조 `trash`
--

CREATE TABLE `trash` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `trash2`
--

CREATE TABLE `trash2` (
  `id` int(11) NOT NULL,
  `gameid` int(10) UNSIGNED DEFAULT NULL,
  `genreid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `juso`
--
ALTER TABLE `juso`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `opt`
--
ALTER TABLE `opt`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `opts`
--
ALTER TABLE `opts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opt_id` (`opt_id`);

--
-- 테이블의 인덱스 `sj`
--
ALTER TABLE `sj`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genre_ibuk_1` (`name`);

--
-- 테이블의 인덱스 `trash2`
--
ALTER TABLE `trash2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gameid` (`gameid`),
  ADD KEY `genreid` (`genreid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `game`
--
ALTER TABLE `game`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- 테이블의 AUTO_INCREMENT `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 테이블의 AUTO_INCREMENT `juso`
--
ALTER TABLE `juso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- 테이블의 AUTO_INCREMENT `opt`
--
ALTER TABLE `opt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `opts`
--
ALTER TABLE `opts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 테이블의 AUTO_INCREMENT `sj`
--
ALTER TABLE `sj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- 테이블의 AUTO_INCREMENT `trash`
--
ALTER TABLE `trash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 테이블의 AUTO_INCREMENT `trash2`
--
ALTER TABLE `trash2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `opts`
--
ALTER TABLE `opts`
  ADD CONSTRAINT `opts_ibfk_1` FOREIGN KEY (`opt_id`) REFERENCES `opt` (`id`);

--
-- 테이블의 제약사항 `trash2`
--
ALTER TABLE `trash2`
  ADD CONSTRAINT `trash2_ibfk_1` FOREIGN KEY (`gameid`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `trash2_ibfk_2` FOREIGN KEY (`genreid`) REFERENCES `genre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
