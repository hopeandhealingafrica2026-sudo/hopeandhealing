<?php
/* lang.php — language switch (en / rw / fr) + all site text.
 * Use t('key') for raw text, e('key') for HTML-safe output.
 * Language is chosen with ?lang=rw|en|fr and remembered in a cookie. */
$LANGS = ['en' => 'EN', 'rw' => 'RW', 'fr' => 'FR'];
$lang  = 'en';   // default language
if (isset($_GET['lang']) && isset($LANGS[$_GET['lang']])) {
    $lang = $_GET['lang'];
    if (!headers_sent()) setcookie('lang', $lang, time() + 31536000, '/');
} elseif (isset($_COOKIE['lang']) && isset($LANGS[$_COOKIE['lang']])) {
    $lang = $_COOKIE['lang'];
}
function t($k) {
    global $T, $lang, $SITE_REPL;
    $s = $T[$k][$lang] ?? $T[$k]['en'] ?? $k;
    return $SITE_REPL ? strtr($s, $SITE_REPL) : $s;
}
function e($k) { return htmlspecialchars(t($k), ENT_QUOTES, 'UTF-8'); }

require_once __DIR__ . '/config.php';
$SITE_REPL = [];   // fill placeholders only when a real value is set in config.php
foreach (['[EMAIL]' => $SITE['email'], '[TELEFONE]' => $SITE['phone'], '[AHO TUBARIZWA]' => $SITE['location']] as $ph => $val) {
    if ($val !== '') $SITE_REPL[$ph] = $val;
}

$T = [

/* ---------- Navigation & UI (rw/fr here are working translations: please review) ---------- */
'nav_home'     => ['en' => "Home", 'rw' => "Ahabanza", 'fr' => "Accueil"],
'nav_about'    => ['en' => "About Us", 'rw' => "Abo Turi Bo", 'fr' => "Qui nous sommes"],
'nav_work'     => ['en' => "Our Work", 'rw' => "Ibyo Dukora", 'fr' => "Nos activités"],
'nav_heart'    => ['en' => "Heart Healing & Holistic Evangelism", 'rw' => "Gukiza Imitima n'Ubutumwa Bwuzuye", 'fr' => "Guérison du cœur et évangélisation holistique"],
'nav_youth'    => ['en' => "Youth Skills for Employability", 'rw' => "Ubumenyi bw'Urubyiruko mu Kwihangira Umurimo", 'fr' => "Compétences des jeunes pour l'emploi"],
'nav_projects' => ['en' => "Projects & Initiatives", 'rw' => "Imishinga n'Ibikorwa", 'fr' => "Projets et initiatives"],
'nav_stories'  => ['en' => "Stories & Publications", 'rw' => "Itangazamakuru Ryubaka", 'fr' => "Récits et publications"],
'nav_involved' => ['en' => "Get Involved", 'rw' => "Twifatanye Natwe", 'fr' => "S'impliquer"],
'nav_contact'  => ['en' => "Contact", 'rw' => "Aho Twabarizwa", 'fr' => "Contact"],
'skip'         => ['en' => "Skip to content", 'rw' => "Simbukira ku bikubiyemo", 'fr' => "Aller au contenu"],
'soon'         => ['en' => "Content coming soon.", 'rw' => "Ibisobanuro biraza vuba.", 'fr' => "Contenu à venir."],
'learn_more'   => ['en' => "Learn more", 'rw' => "Menya byinshi", 'fr' => "En savoir plus"],
'what_we_do'   => ['en' => "What we do", 'rw' => "Ibyo dukora", 'fr' => "Ce que nous faisons"],
'explore'      => ['en' => "Explore our work", 'rw' => "Reba ibyo dukora", 'fr' => "Découvrir nos activités"],
'walk'         => ['en' => "Walk with us", 'rw' => "Tugendane", 'fr' => "Marchez avec nous"],
'walk_desc'    => ['en' => "Partner with us, support the work, or give your time as a volunteer.", 'rw' => "Dufatanye, mushyigikire ibikorwa, cyangwa mutange igihe cyanyu nk'umukorerabushake.", 'fr' => "Devenez partenaire, soutenez notre travail ou offrez votre temps comme bénévole."],
'footer_note'  => ['en' => "Heart healing, holistic evangelism and youth skills for employability.", 'rw' => "Gukiza imitima, ubutumwa bwuzuye n'ubumenyi bw'urubyiruko mu kwihangira umurimo.", 'fr' => "Guérison du cœur, évangélisation holistique et compétences des jeunes pour l'emploi."],
'rights'       => ['en' => "All rights reserved.", 'rw' => "Uburenganzira bwose burafitwe.", 'fr' => "Tous droits réservés."],

/* ---------- Home hero ---------- */
'hero_h1'   => ['en' => "Ruhuka Umutima", 'rw' => "Ruhuka Umutima", 'fr' => "Ruhuka Umutima"],
'hero_desc' => [
  'rw' => "Dufasha urubyiruko kwiremamo ibyiringiro binyuze mu bwigenge bw'imitekerereze mishya, ubujyanama bw'ubuzima bwo mu mutwe, no kubaka ubumenyi bufite ireme mu rukundo.",
  'en' => "Empowering youth to build hope through a renewed mindset, mental health counseling, and skills development rooted in peace and love.",
  'fr' => "Aider les jeunes à bâtir l'espoir grâce à un esprit renouvelé, au soutien psychologique et au renforcement des compétences dans l'amour."],

/* ---------- About Us ---------- */
'who_title' => ['en' => "Who We Are", 'rw' => "Abo Turi Bo", 'fr' => "Qui Nous Sommes"],
'who_body'  => [
  'rw' => "Hope & Healing Africa ni umuryango ufasha ababyifuza cyane urubyiruko, kwiremamo ibyiringiro, ubuzima bwo mu mutwe, no kwiteza imbere binyuze mu ikoranabuhanga n'ubumenyibufatika.",
  'en' => "Hope & Healing Africa is an organization dedicated to empowering all those in need, especially youth, through hope, mental health support, and practical digital skills.",
  'fr' => "Hope & Healing Africa est une organisation dédiée à l'autonomisation des jeunes par l'espoir, le soutien en santé mentale et les compétences numériques."],
'mission_title' => ['en' => "Our Mission", 'rw' => "Intego Yacu", 'fr' => "Notre Mission"],
'mission_body'  => [
  'rw' => "Kubaka umuryango ufite imitekerereze mishya binyuze mu burezi bw'ikoranabuhanga no gukiza imitima.",
  'en' => "Building a renewed mindset generation through digital education and emotional healing.",
  'fr' => "Bâtir une génération à l'esprit renouvelé grâce à l'éducation numérique et à la guérison émotionnelle."],
'values_title' => ['en' => "Our Core Values", 'rw' => "Indangagaciro Zacu", 'fr' => "Nos Valeurs Fondamentales"],
'values_head'  => [
  'rw' => "Agaciro kacu Gashingiye ku Rukundo rwa Gikirisitu, Kwihangana, ubworoherane no Kwakira Buri Wese",
  'en' => "Christian Values, Tolerance & Acceptance",
  'fr' => "Valeurs Chrétiennes, Tolérance et Acceptation"],
'values_body'  => [
  'rw' => "Twakira buri muntu nta vangura, duharanira kubakira hamwe ejo hazaza heza harangwa n'urukundo, icyizere no gufashanya mu mahoro.",
  'en' => "We warmly embrace everyone without discrimination, striving together to build a future rooted in love, mutual respect, and compassion.",
  'fr' => "Nous accueillons chaleureusement chacun sans discrimination, œuvrant ensemble pour un avenir fondé sur l'amour et le respect mutuel."],
'teach_title' => ['en' => "What We Teach", 'rw' => "Ibyo Twigisha", 'fr' => "Ce Que Nous Enseignons"],
'teach_head'  => [
  'rw' => "Kuzurwa Ubuzima Bushya mu mitekerereze",
  'en' => "Renewal of Mindset & Spiritual Regeneration",
  'fr' => "Renouvellement de l'Esprit et Régénération"],
'teach_body'  => [
  'rw' => "Twemera ko kuvuka ubwa kabiri (Born Again) bigendanye n'impinduka mu bwenge bizana ubutumwa bw'amahoro, kwanga icyaha no gukunda ibyiza, bituma umuntu yigiramo ubushobozi bwo kwiyubaka no guteza imbere umuryango mugari abamo.",
  'en' => "Embracing a transformed mindset and spiritual rebirth (born again) that fosters a deep aversion to wrongdoing, a love for righteousness, and personal resilience.",
  'fr' => "Promouvoir une transformation mentale et spirituelle (renaissance) qui inspire le rejet du mal, l'amour du bien et la résilience personnelle."],

/* ---------- Heart Healing ---------- */
'mental_title' => [
  'rw' => "Ubuzima bwo mu Mutwe no Gukira Kw'Imitima",
  'en' => "Heart Healing & Mental Health",
  'fr' => "Guérison Émotionnelle et Santé Mentale"],
'mental_desc'  => [
  'rw' => "Dutanga ubujyanama n'inkunga y'ubumuntu ku bafite ibikomere, dufasha mu guhindura imitekerereze no gukira k'umutima, twakira buri wese nta vangura.",
  'en' => "We offer counseling and psychosocial support for mindset transformation and emotional healing, welcoming everyone without discrimination.",
  'fr' => "Nous offrons un accompagnement psychologique pour la transformation mentale et la guérison émotionnelle, accueillant chacun sans discrimination."],
'heart_l1' => ['en' => "Heart Healing", 'rw' => "Gukiza Umutima", 'fr' => "Guérison du cœur"],
'heart_l2' => ['en' => "Holistic Evangelism", 'rw' => "Ubutumwa Bwuzuye", 'fr' => "Évangélisation holistique"],
'heart_l3' => ['en' => "Counseling", 'rw' => "Ubujyanama", 'fr' => "Accompagnement"],
'heart_l4' => ['en' => "Hope & Resilience", 'rw' => "Ibyiringiro no Kwihangana", 'fr' => "Espoir et résilience"],

/* ---------- Youth Skills ---------- */
'skills_title' => [
  'rw' => "Ubumenyi n'Ikoranabuhanga ku Rubyiruko",
  'en' => "Youth Digital Skills & Training",
  'fr' => "Compétences Numériques et Formation des Jeunes"],
'skills_desc'  => [
  'rw' => "Duha urubyiruko ubumenyi bw'ibanze bw'ikoranabuhanga n'imitekerereze izana icyizere cy'iterambere rirambye mu mahoro.",
  'en' => "Equipping youth with foundational digital skills and a forward-thinking mindset for sustainable development in peace.",
  'fr' => "Doter les jeunes de compétences numériques fondamentales et d'un esprit novateur pour un développement durable dans la paix."],
'ys_l1' => ['en' => "Digital Skills", 'rw' => "Ubumenyi bw'Ikoranabuhanga", 'fr' => "Compétences numériques"],
'ys_l2' => ['en' => "Vocational & Technical Skills", 'rw' => "Ubumenyi bw'Umwuga n'Ubuhanga", 'fr' => "Compétences professionnelles et techniques"],
'ys_l3' => ['en' => "Entrepreneurship & Employability", 'rw' => "Kwihangira Umurimo no Kubona Akazi", 'fr' => "Entrepreneuriat et employabilité"],
'ys_l4' => ['en' => "Multimedia", 'rw' => "Amajwi, Amashusho n'Amakuru", 'fr' => "Multimédia"],
'ys_l5' => ['en' => "Digital Mobility & Technology", 'rw' => "Ikoranabuhanga mu Ngendo (HDMT)", 'fr' => "Mobilité numérique et technologie"],

'multimedia_title' => [
  'rw' => "Amajwi, Amashusho n'Amakuru",
  'en' => "Multimedia",
  'fr' => "Multimédia"],
'multimedia_desc'  => [
  'rw' => "Twigisha urubyiruko gukora amajwi, amashusho, n'inkuru ziteza imbere imitekerereze miziza, amahoro, no kwiyubaka.",
  'en' => "Training youth in audio-visual production and content creation that promotes a transformed mindset, peace, and empowerment.",
  'fr' => "Former les jeunes à la production audiovisuelle et à la création de contenus promouvant un esprit renouvelé et la paix."],

'hdmt_title' => [
  'rw' => "Gahunda ya HDMT (Hope Digital Mobility Tech)",
  'en' => "HDMT Program (Hope Digital Mobility Tech)",
  'fr' => "Programme HDMT (Hope Digital Mobility Tech)"],
'hdmt_desc'  => [
  'rw' => "Gahunda ya HDMT itanga ubumenyi bw'ikoranabuhanga, kwiga gutwara ibinyabiziga, amategeko y'umuhanda, na OBD-II; yunganirwa no guhugura urubyiruko mu miyoborere isukuye n'ubunyamakuru bw'abaturage hagamijwe gukiza imitima.",
  'en' => "The HDMT program delivers technology skills, driver training, traffic rules, and OBD-II diagnostics, coupled with wholesome leadership and community journalism for emotional healing.",
  'fr' => "Le programme HDMT dispense des compétences technologiques, la formation à la conduite, le code de la route, le diagnostic OBD-II et le journalisme communautaire pour la guérison."],
'hd_l1' => ['en' => "Road Safety & Mobility Learning", 'rw' => "Umutekano wo mu Muhanda no Kwiga Gutwara", 'fr' => "Sécurité routière et apprentissage de la mobilité"],
'hd_l2' => ['en' => "Automotive Technology", 'rw' => "Ikoranabuhanga mu Binyabiziga", 'fr' => "Technologie automobile"],
'hd_l3' => ['en' => "OBD-II Diagnostics", 'rw' => "Isuzuma rya OBD-II", 'fr' => "Diagnostics OBD-II"],

/* ---------- Contact ---------- */
'contact_title' => ['en' => "Contact Us", 'rw' => "Aho Twabarizwa", 'fr' => "Contactez-nous"],
'contact_desc'  => [
  'rw' => "Twandikire cyangwa utugereho. Twakira buri wese n'ibitekerezo bye mu bufatanye bwuzuye n'urukundo.",
  'en' => "Get in touch with us. We welcome everyone and value your feedback in a spirit of collaboration and love.",
  'fr' => "Contactez-nous. Nous accueillons tout le monde et apprécions vos commentaires dans un esprit de collaboration et d'amour."],

/* ---------- Page content added from GPT draft (rw reviewed; en/fr working translations) ---------- */
'vision_t' => [
  'rw' => "Icyerekezo",
  'en' => "Vision",
  'fr' => "Vision"],
'vision_d' => [
  'rw' => "Twifuza kubona abantu bafite umutima ukomeye, bafite amahoro n'ibyiringiro. Dushaka gufasha cyane cyane urubyiruko kugira ubumenyi bubafasha kwiteza imbere no kubona akazi.",
  'en' => "We hope to see people with strong hearts, living in peace and hope. We especially want to help young people gain the skills they need to grow and find work.",
  'fr' => "Nous voulons voir des personnes au cœur fort, vivant dans la paix et l'espoir. Nous souhaitons surtout aider les jeunes à acquérir les compétences qui leur permettent de progresser et de trouver un emploi."],
'approach_t' => [
  'rw' => "Uburyo Dukora",
  'en' => "Our Approach",
  'fr' => "Notre approche"],
'approach_d' => [
  'rw' => "Dukora dushingiye ku rukundo rwa Gikristo, kubaha buri muntu no kwakira abantu bose nta vangura. Duhuza ubufasha bwo gukira ibikomere byo mu mutima, ubujyanama, ivugabutumwa n'amahugurwa y'urubyiruko.",
  'en' => "We work from Christian love, respect for every person, and a welcome for everyone without discrimination. We bring together heart healing, counseling, evangelism and youth training.",
  'fr' => "Nous agissons par amour chrétien, en respectant chaque personne et en accueillant tout le monde sans discrimination. Nous réunissons la guérison du cœur, l'accompagnement, l'évangélisation et la formation des jeunes."],
'couns_t' => [
  'rw' => "Ubujyanama",
  'en' => "Counseling",
  'fr' => "Accompagnement"],
'couns_d' => [
  'rw' => "Dutanga umwanya wo gutega amatwi no kuganiriza abantu bafite ibibazo cyangwa ibikomere byo mu mutima. Ubujyanama bugamije gufasha umuntu kubona ituze, ibyiringiro no gutera intambwe nshya.",
  'en' => "We make time to listen to and talk with people who are carrying troubles or wounds of the heart. Counseling aims to help a person find calm, hope and a new step forward.",
  'fr' => "Nous prenons le temps d'écouter et de parler avec celles et ceux qui portent des difficultés ou des blessures du cœur. L'accompagnement vise à aider chacun à trouver le calme, l'espoir et un nouveau pas en avant."],
'hope_t' => [
  'rw' => "Ibyiringiro no Kwihangana",
  'en' => "Hope & Resilience",
  'fr' => "Espoir et résilience"],
'hope_d' => [
  'rw' => "Dufasha abantu kongera kubona ibyiringiro no gukomera mu bihe bikomeye. Tubashishikariza kugira umutima w'amahoro no kureba ejo hazaza bafite icyizere.",
  'en' => "We help people find hope again and grow strong in hard times. We encourage a peaceful heart and a future seen with confidence.",
  'fr' => "Nous aidons les personnes à retrouver l'espoir et à se fortifier dans les moments difficiles. Nous les encourageons à avoir un cœur paisible et à regarder l'avenir avec confiance."],
'voc_d' => [
  'rw' => "Dufasha urubyiruko kubona ubumenyi ngiro bashobora gukoresha mu kazi no mu kwihangira imirimo. Amahugurwa ashobora kubamo ubumenyi bwa tekiniki, ikoranabuhanga n'indi myuga ijyanye n'ibikenewe.",
  'en' => "We help young people gain practical skills they can use at work and to start their own activity. Training may include technical skills, technology and other trades that meet real needs.",
  'fr' => "Nous aidons les jeunes à acquérir des compétences pratiques utiles au travail et à la création de leur propre activité. Les formations peuvent porter sur des savoir-faire techniques, la technologie et d'autres métiers répondant aux besoins réels."],
'ent_d' => [
  'rw' => "Dufasha urubyiruko guteza imbere ibitekerezo by'imishinga no kumenya uko bakoresha ubumenyi bafite. Intego ni ukubafasha kwitegura akazi, kwihangira imirimo no kugira uruhare mu iterambere ryabo.",
  'en' => "We help young people develop their project ideas and put what they know to good use. The goal is to prepare them for work, to start their own activity, and to take part in their own growth.",
  'fr' => "Nous aidons les jeunes à développer leurs idées de projets et à bien utiliser leurs connaissances. Le but est de les préparer au travail, à l'entrepreneuriat et à participer à leur propre développement."],
'pr_cur_t' => [
  'rw' => "Imishinga iri gukorwa",
  'en' => "Current Projects",
  'fr' => "Projets en cours"],
'pr_cur_d' => [
  'rw' => "Dushyira mu bikorwa imishinga igamije gukiza ibikomere, guteza imbere urubyiruko no kubongerera ubumenyi. Imishinga iriho izajya isobanurwa hano uko itera imbere.",
  'en' => "We carry out projects that aim to heal wounds, support young people and grow their skills. Ongoing projects will be described here as they move forward.",
  'fr' => "Nous menons des projets qui visent à guérir les blessures, soutenir les jeunes et développer leurs compétences. Les projets en cours seront présentés ici au fur et à mesure de leur avancement."],
'pr_com_t' => [
  'rw' => "Ibikorwa by'Umuryango",
  'en' => "Community Initiatives",
  'fr' => "Initiatives communautaires"],
'pr_com_d' => [
  'rw' => "Dukorana n'abaturage mu bikorwa bigamije guteza imbere imibereho myiza, amahoro n'ubushobozi bw'urubyiruko. Twita ku byo abaturage bakeneye kandi tugashaka ibisubizo bibafasha.",
  'en' => "We work with the community on activities that improve well-being, peace and the strength of young people. We listen to what people need and look for solutions that help.",
  'fr' => "Nous travaillons avec la population sur des actions qui améliorent le bien-être, la paix et les capacités des jeunes. Nous écoutons les besoins et cherchons des solutions utiles."],
'pr_par_t' => [
  'rw' => "Ubufatanye",
  'en' => "Partnerships",
  'fr' => "Partenariats"],
'pr_par_d' => [
  'rw' => "Twizera ko gukorana bituma tugera kuri byinshi. Twakira imiryango, ibigo n'abantu bafite ubushake bwo gufatanya natwe mu bikorwa byacu.",
  'en' => "We believe that working together helps us reach more. We welcome organizations, institutions and individuals who wish to join us in our work.",
  'fr' => "Nous croyons que travailler ensemble nous permet d'aller plus loin. Nous accueillons les organisations, institutions et personnes qui souhaitent s'associer à notre action."],
'st_com_t' => [
  'rw' => "Inkuru z'Abaturage",
  'en' => "Community Stories",
  'fr' => "Récits de la communauté"],
'st_com_d' => [
  'rw' => "Dusangiza inkuru z'ibikorwa n'impinduka ziboneka mu baturage. Tubikora mu buryo bwubaha ubuzima n'amahitamo ya buri muntu.",
  'en' => "We share stories of the activities and changes seen in the community, in a way that respects each person's life and choices.",
  'fr' => "Nous partageons des récits d'actions et de changements observés dans la communauté, dans le respect de la vie et des choix de chacun."],
'st_test_t' => [
  'rw' => "Ubuhamya",
  'en' => "Testimonials",
  'fr' => "Témoignages"],
'st_test_d' => [
  'rw' => "Aha hazajya hagaragara ubuhamya bw'abantu bemeye gusangiza abandi ubunararibonye bwabo. Ubuhamya buzajya butangazwa gusa igihe uwabutanze abyemeye.",
  'en' => "This space will show testimonies from people who agree to share their experience. A testimony is published only with the permission of the person who gave it.",
  'fr' => "Cet espace présentera les témoignages de personnes qui acceptent de partager leur expérience. Un témoignage n'est publié qu'avec l'accord de la personne concernée."],
'st_pub_t' => [
  'rw' => "Inyandiko z'Imibereho n'Uburezi",
  'en' => "Social & Educational Publications",
  'fr' => "Publications sociales et éducatives"],
'st_pub_d' => [
  'rw' => "Dusangiza amakuru n'inyandiko zifasha abantu kumenya byinshi ku buzima, amahoro, urubyiruko n'iterambere. Intego ni ugutanga amakuru yoroshye kandi afasha.",
  'en' => "We share information and articles that help people learn more about health, peace, youth and development. Our goal is to offer information that is simple and useful.",
  'fr' => "Nous partageons des informations et des articles qui aident à mieux comprendre la santé, la paix, la jeunesse et le développement. Notre but est d'offrir une information simple et utile."],
'gi_par_t' => [
  'rw' => "Dufatanye",
  'en' => "Partner With Us",
  'fr' => "Devenir partenaire"],
'gi_par_d' => [
  'rw' => "Turahamagarira imiryango, ibigo n'abantu ku giti cyabo gufatanya natwe mu bikorwa byacu. Ushobora kutwandikira kuri [EMAIL] kugira ngo tumenye uko twafatanya.",
  'en' => "We invite organizations, institutions and individuals to work with us. You can write to us at [EMAIL] so we can see how to work together.",
  'fr' => "Nous invitons les organisations, institutions et personnes à agir avec nous. Vous pouvez nous écrire à [EMAIL] pour voir comment collaborer."],
'gi_sup_t' => [
  'rw' => "Dushyigikire",
  'en' => "Support Our Work",
  'fr' => "Soutenir notre travail"],
'gi_sup_d' => [
  'rw' => "Inkunga yawe ishobora gufasha ibikorwa bigamije gukiza ibikomere no guteza imbere ubumenyi bw'urubyiruko. Ku bijyanye n'uburyo bwo gutanga inkunga, twandikire kuri [EMAIL].",
  'en' => "Your support can help activities that heal wounds and build the skills of young people. To learn how to give, write to us at [EMAIL].",
  'fr' => "Votre soutien peut aider les actions qui guérissent les blessures et développent les compétences des jeunes. Pour savoir comment donner, écrivez-nous à [EMAIL]."],
'gi_vol_t' => [
  'rw' => "Ba Umukorerabushake",
  'en' => "Volunteer",
  'fr' => "Devenir bénévole"],
'gi_vol_d' => [
  'rw' => "Abantu bafite ubushake bwo gukoresha igihe n'ubumenyi bwabo mu gufasha abandi bashobora gukorana natwe. Twandikire kuri [EMAIL] kugira ngo umenye amahirwe ahari.",
  'en' => "People who wish to give their time and skills to help others can work with us. Write to us at [EMAIL] to learn about opportunities.",
  'fr' => "Les personnes qui souhaitent donner de leur temps et de leurs compétences pour aider les autres peuvent travailler avec nous. Écrivez-nous à [EMAIL] pour connaître les possibilités."],
'ct_info_t' => [
  'rw' => "Amakuru yo Kutwandikira",
  'en' => "Contact Information",
  'fr' => "Coordonnées"],
'ct_info_d' => [
  'rw' => "Ushobora kutwandikira kuri [EMAIL], [TELEFONE] cyangwa gukoresha ifishi iri kuri uru rubuga.",
  'en' => "You can reach us at [EMAIL], [TELEFONE], or use the form on this site.",
  'fr' => "Vous pouvez nous joindre à [EMAIL], au [TELEFONE], ou utiliser le formulaire de ce site."],
'ct_loc_t' => [
  'rw' => "Aho Tubarizwa",
  'en' => "Location",
  'fr' => "Localisation"],
'ct_loc_d' => [
  'rw' => "Aho umuryango uboneka ni [AHO TUBARIZWA]. Ku yandi makuru yerekeye kutugenderera, twandikire mbere.",
  'en' => "Our organization is located at [AHO TUBARIZWA]. To visit us, please write to us first.",
  'fr' => "Notre organisation se trouve à [AHO TUBARIZWA]. Pour nous rendre visite, merci de nous écrire d'abord."],
'ct_form_t' => [
  'rw' => "Ifishi yo Kutwandikira",
  'en' => "Contact Form",
  'fr' => "Formulaire de contact"],
'ct_form_d' => [
  'rw' => "Twandikire ukoresheje ifishi iri hano, maze dusubize ubutumwa bwawe igihe bishoboka.",
  'en' => "Write to us using the form below and we will reply as soon as we can.",
  'fr' => "Écrivez-nous avec le formulaire ci-dessous et nous répondrons dès que possible."],
'f_name' => [
  'rw' => "Amazina",
  'en' => "Name",
  'fr' => "Nom"],
'f_email' => [
  'rw' => "Imeyili",
  'en' => "Email",
  'fr' => "E-mail"],
'f_phone' => [
  'rw' => "Telefoni",
  'en' => "Phone",
  'fr' => "Téléphone"],
'f_message' => [
  'rw' => "Ubutumwa",
  'en' => "Message",
  'fr' => "Message"],
'f_send' => [
  'rw' => "Ohereza",
  'en' => "Send",
  'fr' => "Envoyer"],
'f_ok' => [
  'rw' => "Murakoze! Ubutumwa bwawe bwoherejwe.",
  'en' => "Thank you! Your message has been sent.",
  'fr' => "Merci ! Votre message a bien été envoyé."],
'f_bad' => [
  'rw' => "Nyamuneka uzuze amazina, imeyili yemewe n'ubutumwa.",
  'en' => "Please fill in your name, a valid email and a message.",
  'fr' => "Merci d'indiquer votre nom, un e-mail valide et un message."],
'f_fail' => [
  'rw' => "Ubutumwa ntibwashoboye koherezwa. Nyamuneka ongera nyuma.",
  'en' => "The message could not be sent. Please try again later.",
  'fr' => "Le message n'a pas pu être envoyé. Veuillez réessayer plus tard."],

/* ---------- Article: constructive social media ---------- */
'art1_t' => [
  'rw' => "Gukoresha Imbuga Nkoranyambaga mu Kubaka, Atari mu Gusenya",
  'en' => "Using Social Media to Build, Not to Break",
  'fr' => "Utiliser les réseaux sociaux pour construire, pas pour détruire"],
'art1_teaser' => [
  'rw' => "Uko urubyiruko rushobora gukoresha imbuga nkoranyambaga mu kubaka, aho kwirirwa mu nkuru zisenya no gushyushya imitwe.",
  'en' => "How young people can use social media to build, instead of getting lost in shocking stories and heated arguments.",
  'fr' => "Comment les jeunes peuvent utiliser les réseaux sociaux pour construire, au lieu de se perdre dans les récits choquants et les disputes."],
'art_read' => [
  'rw' => "Soma inyandiko yose",
  'en' => "Read the full article",
  'fr' => "Lire l'article complet"],
'art_back' => [
  'rw' => "Subira ku Itangazamakuru Ryubaka",
  'en' => "Back to Stories & Publications",
  'fr' => "Retour aux récits et publications"],
'art1_p1' => [
  'rw' => "Buri munsi, urubyiruko rumara igihe kinini ku mbuga nkoranyambaga. Ni ahantu bigira, basangira amakuru kandi bakamenya byinshi ku isi. Ariko kandi ni ahantu amakuru ateye ubwoba, ibihuha n'impaka zikomeye bikwirakwira vuba, bigasiga bamwe bafite ubwoba, bacitse intege cyangwa bacitsemo ibice.",
  'en' => "Every day, young people spend hours on social media. It is where they learn, share and discover the world. It is also where shocking headlines, rumors and heated arguments travel fastest, and they can leave people anxious, divided and discouraged.",
  'fr' => "Chaque jour, les jeunes passent des heures sur les réseaux sociaux. C'est là qu'ils apprennent, partagent et découvrent le monde. C'est aussi là que les titres choquants, les rumeurs et les disputes se propagent le plus vite, et qu'ils peuvent laisser les gens anxieux, divisés et découragés."],
'art1_p2' => [
  'rw' => "Muri Hope and Healing Africa – Ruhuka Umutima, twemera ko izi mbuga zishobora gukoreshwa mu bundi buryo. Zishobora kuba ahantu hatangirwa inkuru nziza, hasangirwa ibitekerezo bifasha abaturage, kandi urubyiruko rukahabonera ibyiringiro aho kubona urusaku n'amakimbirane gusa.",
  'en' => "At Hope and Healing Africa, we believe there is another way to use these tools. Social media can be a place where good stories are told, where ideas that help the community are shared, and where young people find hope instead of noise.",
  'fr' => "Chez Hope and Healing Africa, nous croyons qu'il existe une autre façon d'utiliser ces outils. Les réseaux sociaux peuvent être un lieu où l'on raconte de belles histoires, où l'on partage des idées utiles à la communauté, et où les jeunes trouvent de l'espoir plutôt que du bruit."],
'art1_h1' => [
  'rw' => "Itumanaho ryubaka ni iki?",
  'en' => "What is constructive communication?",
  'fr' => "Qu'est-ce que la communication constructive ?"],
'art1_h1p1' => [
  'rw' => "Itumanaho ryubaka ni ugusangiza abantu amakuru abigisha, abatera imbaraga kandi abafasha kwegerana. Ni ukubanza kugenzura amakuru mbere yo kuyasangiza abandi, no kuvuga mu cyubahiro n'iyo tutemeranya.",
  'en' => "It means sharing what informs, encourages and brings people together. It means checking before we post, and speaking with respect even when we disagree.",
  'fr' => "C'est partager ce qui informe, encourage et rassemble. C'est vérifier avant de publier, et parler avec respect même lorsqu'on n'est pas d'accord."],
'art1_h1p2' => [
  'rw' => "Ni no kuvuga inkuru y'umuturanyi wafashije undi, ubumenyi umuntu yize, cyangwa ikibazo abaturage bakemuriye hamwe. Ibi ntibisobanura guhisha ibibazo bikomeye. Bisobanura kubivugaho mu buryo bushaka ibisubizo kandi burinda icyubahiro n'agaciro bya buri muntu.",
  'en' => "It means telling the story of a neighbor who helped, a skill someone learned, or a problem a community solved together. It does not mean hiding hard realities. It means speaking about them in a way that looks for solutions and protects people's dignity.",
  'fr' => "C'est raconter l'histoire d'un voisin qui a aidé, d'un savoir-faire appris, ou d'un problème résolu ensemble par une communauté. Cela ne veut pas dire cacher les réalités difficiles. Cela veut dire en parler en cherchant des solutions et en protégeant la dignité des personnes."],
'art1_h2' => [
  'rw' => "Kuki twita ku rubyiruko?",
  'en' => "Why young people?",
  'fr' => "Pourquoi les jeunes ?"],
'art1_h2p1' => [
  'rw' => "Urubyiruko rwinshi rufite impano mu kwandika, gufata amafoto, gukora amashusho, umuziki cyangwa kuvuga imbere y'abantu. Ariko hari igihe rubura ubuyobozi, aho kugaragariza impano zarwo, cyangwa umuntu warwereka inzira.",
  'en' => "Many young people have real talent for writing, photography, video, music or speaking. Often they lack guidance, an audience, or someone to show them the way.",
  'fr' => "Beaucoup de jeunes ont un vrai talent pour l'écriture, la photo, la vidéo, la musique ou la prise de parole. Souvent, il leur manque un accompagnement, un public, ou quelqu'un qui leur montre le chemin."],
'art1_h2p2' => [
  'rw' => "Hari n'abandi bamaze kugira ubunararibonye kandi bakizerwa mu kuvuga inkuru zubaka umuryango. Ubunararibonye bwabo ni ingenzi kandi bukwiye gusangizwa urubyiruko kugira ngo rububyungukiramo.",
  'en' => "At the same time, others have already earned trust by telling stories that build up society. Their experience is valuable, and it should not stay unshared.",
  'fr' => "Dans le même temps, d'autres ont déjà gagné la confiance du public en racontant des histoires qui font grandir la société. Leur expérience est précieuse et ne doit pas rester sans être partagée."],
'art1_h3' => [
  'rw' => "Uburyo dukora",
  'en' => "Our approach",
  'fr' => "Notre approche"],
'art1_h3p1' => [
  'rw' => "Dushaka guhuza urubyiruko rufite impano n'abantu bamaze kugira ubunararibonye mu itumanaho ryubaka. Abatangiye bashobora kubigiraho uburyo bwo guhitamo inkuru, kugenzura amakuru, kubaha abantu bagaragara mu nkuru no gukomeza gukora n'iyo hari ibibazo.",
  'en' => "We want to connect rising young talent with people who have already built a name in constructive communication. Beginners can learn from their example: how to choose a subject, check facts, respect the people in a story, and keep going when it is hard.",
  'fr' => "Nous voulons mettre en relation les jeunes talents émergents avec des personnes qui se sont déjà fait un nom dans la communication constructive. Les débutants peuvent apprendre de leur exemple : comment choisir un sujet, vérifier les faits, respecter les personnes dont on raconte l'histoire, et persévérer quand c'est difficile."],
'art1_h3p2' => [
  'rw' => "Uko ni ko igisekuru kimwe gifasha ikindi kuzamuka, ubumenyi n'uburambe bigakomeza kuva ku gisekuru kimwe bijya ku kindi.",
  'en' => "In this way, one generation lifts the next.",
  'fr' => "Ainsi, une génération élève la suivante."],
'art1_h4' => [
  'rw' => "Amahame yoroshye twakurikiza",
  'en' => "Simple principles to follow",
  'fr' => "Quelques principes simples"],
'art1_l1' => [
  'rw' => "Banza ugenzure amakuru mbere yo kuyasangiza abandi.",
  'en' => "Check before you share.",
  'fr' => "Vérifier avant de partager."],
'art1_l2' => [
  'rw' => "Wubahe icyubahiro n'agaciro bya buri muntu.",
  'en' => "Respect the dignity of every person.",
  'fr' => "Respecter la dignité de chaque personne."],
'art1_l3' => [
  'rw' => "Banza usabe uruhushya mbere yo kuvuga inkuru y'umuntu.",
  'en' => "Ask permission before telling someone's story.",
  'fr' => "Demander la permission avant de raconter l'histoire de quelqu'un."],
'art1_l4' => [
  'rw' => "Shaka ibifasha kandi byubaka, aho gushaka gusa ibiteye ubwoba cyangwa ibitera impagarara.",
  'en' => "Look for what helps, not only for what shocks.",
  'fr' => "Chercher ce qui aide, pas seulement ce qui choque."],
'art1_l5' => [
  'rw' => "Vuga mu mahoro, n'iyo mutemeranya.",
  'en' => "Speak with peace, even when you disagree.",
  'fr' => "Parler avec paix, même en cas de désaccord."],
'art1_h5' => [
  'rw' => "Twifatanye",
  'en' => "Join us",
  'fr' => "Rejoignez-nous"],
'art1_j1' => [
  'rw' => "Niba uri umusore cyangwa inkumi ufite impano, cyangwa ukaba usanzwe usangiza abandi inkuru zubaka umuryango, twifuza kumva ibitekerezo byawe.",
  'en' => "If you are a young person with a gift, or someone already sharing stories that build, we would love to hear from you.",
  'fr' => "Si vous êtes un jeune qui a un don, ou si vous partagez déjà des histoires qui construisent, nous aimerions vous lire."],
'art1_j2' => [
  'rw' => "Twandikire kuri [EMAIL].",
  'en' => "Write to us at [EMAIL].",
  'fr' => "Écrivez-nous à [EMAIL]."],
'art1_j3' => [
  'rw' => "Dufatanye guhindura imbuga nkoranyambaga ahantu hatanga ibyiringiro n'ubumenyi bwubaka.",
  'en' => "Together we can turn our screens into places of hope.",
  'fr' => "Ensemble, faisons de nos écrans des lieux d'espoir."],
];
