<?php
/**
 * Couche multilingue COSM'ETHIQUE.
 *
 * @package Theme_Perso
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function theme_perso_multilingual_is_active() {
    return 'fr' !== theme_perso_current_language();
}

function theme_perso_multilingual_text_map() {
    return array(
        'Accueil' => array(
            'en' => 'Home',
            'es' => 'Inicio',
            'ar' => 'الرئيسية',
        ),
        'Boutique' => array(
            'en' => 'Shop',
            'es' => 'Tienda',
            'ar' => 'المتجر',
        ),
        'Diagnostic' => array(
            'en' => 'Diagnostic',
            'es' => 'Diagnóstico',
            'ar' => 'التشخيص',
        ),
        'Diagnostic Beauté' => array(
            'en' => 'Beauty Diagnostic',
            'es' => 'Diagnóstico de belleza',
            'ar' => 'تشخيص الجمال',
        ),
        'Diagnostic beauté' => array(
            'en' => 'Beauty diagnostic',
            'es' => 'Diagnóstico de belleza',
            'ar' => 'تشخيص الجمال',
        ),
        'Trouvez votre routine idéale.' => array(
            'en' => 'Find your ideal routine.',
            'es' => 'Encuentra tu rutina ideal.',
            'ar' => 'اكتشف روتينك المثالي.',
        ),
        'Répondez à quelques questions et découvrez en moins d\'une minute les soins Cosm\'Éthique parfaitement adaptés à votre peau.' => array(
            'en' => 'Answer a few questions and discover in less than a minute the Cosm’Éthique products perfectly suited to your skin.',
            'es' => 'Responde a unas preguntas y descubre en menos de un minuto los cuidados Cosm’Éthique perfectamente adaptados a tu piel.',
            'ar' => 'أجب عن بعض الأسئلة واكتشف في أقل من دقيقة منتجات كوزم إيثيك المناسبة تماماً لبشرتك.',
        ),
        'Découvrez en moins d’une minute les soins Cosm’Éthique parfaitement adaptés à votre peau et à vos besoins.' => array(
            'en' => 'Discover in less than a minute the Cosm’Éthique products perfectly suited to your skin and needs.',
            'es' => 'Descubre en menos de un minuto los cuidados Cosm’Éthique perfectamente adaptados a tu piel y necesidades.',
            'ar' => 'اكتشف في أقل من دقيقة منتجات كوزم إيتيك الأنسب لبشرتك واحتياجاتك.',
        ),
        'Qui sommes-nous' => array(
            'en' => 'About Us',
            'es' => 'Quiénes somos',
            'ar' => 'من نحن',
        ),
        'Blog' => array(
            'en' => 'Blog',
            'es' => 'Blog',
            'ar' => 'المدونة',
        ),
        'Contact' => array(
            'en' => 'Contact',
            'es' => 'Contacto',
            'ar' => 'اتصل بنا',
        ),
        'Devenir franchisé' => array(
            'en' => 'Become a franchisee',
            'es' => 'Abrir una franquicia',
            'ar' => 'كن صاحب امتياز',
        ),
        'Recherche' => array(
            'en' => 'Search',
            'es' => 'Buscar',
            'ar' => 'بحث',
        ),
        'Rechercher un produit' => array(
            'en' => 'Search for a product',
            'es' => 'Buscar un producto',
            'ar' => 'ابحث عن منتج',
        ),
        'Lancer la recherche' => array(
            'en' => 'Start search',
            'es' => 'Iniciar búsqueda',
            'ar' => 'بدء البحث',
        ),
        'Les suggestions apparaissent automatiquement pendant la saisie.' => array(
            'en' => 'Suggestions appear automatically as you type.',
            'es' => 'Las sugerencias aparecen automáticamente mientras escribes.',
            'ar' => 'تظهر الاقتراحات تلقائياً أثناء الكتابة.',
        ),
        'Suggestions de recherche' => array(
            'en' => 'Search suggestions',
            'es' => 'Sugerencias de búsqueda',
            'ar' => 'اقتراحات البحث',
        ),
        'Recherche en cours…' => array(
            'en' => 'Searching…',
            'es' => 'Buscando…',
            'ar' => 'جار البحث…',
        ),
        'Aucun résultat trouvé. Découvrez nos catégories principales.' => array(
            'en' => 'No results found. Discover our main categories.',
            'es' => 'No se encontraron resultados. Descubre nuestras categorías principales.',
            'ar' => 'لم يتم العثور على نتائج. اكتشف فئاتنا الرئيسية.',
        ),
        'Voir tous les résultats' => array(
            'en' => 'View all results',
            'es' => 'Ver todos los resultados',
            'ar' => 'عرض كل النتائج',
        ),
        'Produit' => array(
            'en' => 'Product',
            'es' => 'Producto',
            'ar' => 'منتج',
        ),
        'Catégorie' => array(
            'en' => 'Category',
            'es' => 'Categoría',
            'ar' => 'فئة',
        ),
        'Page' => array(
            'en' => 'Page',
            'es' => 'Página',
            'ar' => 'صفحة',
        ),
        'Collection' => array(
            'en' => 'Collection',
            'es' => 'Colección',
            'ar' => 'مجموعة',
        ),
        'Saisissez au moins deux caractères.' => array(
            'en' => 'Enter at least two characters.',
            'es' => 'Introduce al menos dos caracteres.',
            'ar' => 'أدخل حرفين على الأقل.',
        ),
        'Aller au contenu' => array(
            'en' => 'Skip to content',
            'es' => 'Saltar al contenido',
            'ar' => 'تخطي إلى المحتوى',
        ),
        'Avantages COSM’ETHIQUE' => array(
            'en' => 'COSM’ÉTHIQUE benefits',
            'es' => 'Ventajas COSM’ÉTHIQUE',
            'ar' => 'مزايا كوزم إيثيك',
        ),
        'Accueil COSM’ETHIQUE' => array(
            'en' => 'COSM’ÉTHIQUE home',
            'es' => 'Inicio COSM’ÉTHIQUE',
            'ar' => 'صفحة كوزم إيثيك الرئيسية',
        ),
        'Ouvrir le menu' => array(
            'en' => 'Open menu',
            'es' => 'Abrir menú',
            'ar' => 'فتح القائمة',
        ),
        'Navigation principale' => array(
            'en' => 'Main navigation',
            'es' => 'Navegación principal',
            'ar' => 'التنقل الرئيسي',
        ),
        'Mon compte' => array(
            'en' => 'My account',
            'es' => 'Mi cuenta',
            'ar' => 'حسابي',
        ),
        'Panier' => array(
            'en' => 'Cart',
            'es' => 'Carrito',
            'ar' => 'السلة',
        ),
        'Livraison offerte dès 40€ d’achat' => array(
            'en' => 'Free delivery from €40',
            'es' => 'Envío gratis desde 40 €',
            'ar' => 'توصيل مجاني ابتداء من 40€',
        ),
        'Livraison rapide' => array(
            'en' => 'Fast delivery',
            'es' => 'Entrega rápida',
            'ar' => 'توصيل سريع',
        ),
        '24-72h en France' => array(
            'en' => '24-72h in France',
            'es' => '24-72h en Francia',
            'ar' => '24-72 ساعة في فرنسا',
        ),
        'Produits bio' => array(
            'en' => 'Organic products',
            'es' => 'Productos ecológicos',
            'ar' => 'منتجات عضوية',
        ),
        'Actifs sélectionnés' => array(
            'en' => 'Selected active ingredients',
            'es' => 'Activos seleccionados',
            'ar' => 'مكونات فعالة مختارة',
        ),
        'Paiement sécurisé' => array(
            'en' => 'Secure payment',
            'es' => 'Pago seguro',
            'ar' => 'دفع آمن',
        ),
        'SSL & solutions fiables' => array(
            'en' => 'SSL & trusted solutions',
            'es' => 'SSL y soluciones fiables',
            'ar' => 'SSL وحلول موثوقة',
        ),
        'Cruelty free' => array(
            'en' => 'Cruelty free',
            'es' => 'Cruelty free',
            'ar' => 'خال من التجارب على الحيوانات',
        ),
        'Aucun test animal' => array(
            'en' => 'No animal testing',
            'es' => 'Sin pruebas en animales',
            'ar' => 'بدون اختبارات على الحيوانات',
        ),
        'Emballages recyclés' => array(
            'en' => 'Recycled packaging',
            'es' => 'Envases reciclados',
            'ar' => 'عبوات معاد تدويرها',
        ),
        'Choix responsables' => array(
            'en' => 'Responsible choices',
            'es' => 'Opciones responsables',
            'ar' => 'اختيارات مسؤولة',
        ),
        'Découvrir les soins' => array(
            'en' => 'Discover the products',
            'es' => 'Descubrir los cuidados',
            'ar' => 'اكتشف المنتجات',
        ),
        'Diagnostic premium' => array(
            'en' => 'Premium diagnostic',
            'es' => 'Diagnóstico premium',
            'ar' => 'تشخيص فاخر',
        ),
        'DIAGNOSTIC PREMIUM' => array(
            'en' => 'PREMIUM DIAGNOSTIC',
            'es' => 'DIAGNÓSTICO PREMIUM',
            'ar' => 'تشخيص فاخر',
        ),
        'Découvrez votre routine personnalisée en moins d\'une minute.' => array(
            'en' => 'Discover your personalised routine in less than a minute.',
            'es' => 'Descubre tu rutina personalizada en menos de un minuto.',
            'ar' => 'اكتشف روتينك الشخصي في أقل من دقيقة.',
        ),
        'Routine premium avec produits Cosm’Éthique' => array(
            'en' => 'Premium routine with Cosm’Éthique products',
            'es' => 'Rutina premium con productos Cosm’Éthique',
            'ar' => 'روتين فاخر مع منتجات كوزم إيثيك',
        ),
        'Avantages du diagnostic beauté' => array(
            'en' => 'Beauty diagnostic benefits',
            'es' => 'Ventajas del diagnóstico de belleza',
            'ar' => 'مزايا تشخيص الجمال',
        ),
        'Avantages du Diagnostic Beauté' => array(
            'en' => 'Beauty Diagnostic benefits',
            'es' => 'Ventajas del Diagnóstico de belleza',
            'ar' => 'مزايا تشخيص الجمال',
        ),
        'Diagnostic Beauté avec les soins Cosm’Éthique' => array(
            'en' => 'Beauty Diagnostic with Cosm’Éthique products',
            'es' => 'Diagnóstico de belleza con productos Cosm’Éthique',
            'ar' => 'تشخيص الجمال مع منتجات كوزم إيثيك',
        ),
        'Commencer le diagnostic' => array(
            'en' => 'Start the diagnostic',
            'es' => 'Empezar el diagnóstico',
            'ar' => 'ابدأ التشخيص',
        ),
        '1 minute' => array(
            'en' => '1 minute',
            'es' => '1 minuto',
            'ar' => 'دقيقة واحدة',
        ),
        'Gratuit' => array(
            'en' => 'Free',
            'es' => 'Gratis',
            'ar' => 'مجاني',
        ),
        '100 % personnalisé' => array(
            'en' => '100% personalised',
            'es' => '100 % personalizado',
            'ar' => 'مخصص 100%',
        ),
        'Produits adaptés à votre peau' => array(
            'en' => 'Products suited to your skin',
            'es' => 'Productos adaptados a tu piel',
            'ar' => 'منتجات مناسبة لبشرتك',
        ),
        'Résultat immédiat' => array(
            'en' => 'Instant result',
            'es' => 'Resultado inmediato',
            'ar' => 'نتيجة فورية',
        ),
        'Produits adaptés à votre profil' => array(
            'en' => 'Products suited to your profile',
            'es' => 'Productos adaptados a tu perfil',
            'ar' => 'منتجات مناسبة لملفك',
        ),
        'Votre routine idéale, pensée pour vous' => array(
            'en' => 'Your ideal routine, designed for you',
            'es' => 'Tu rutina ideal, pensada para ti',
            'ar' => 'روتينك المثالي المصمم لك',
        ),
        'Répondez à six questions simples. Nous construisons ensuite une routine Cosm’Éthique adaptée à votre peau, à vos préférences et à votre budget.' => array(
            'en' => 'Answer six simple questions. We then build a Cosm’Éthique routine tailored to your skin, preferences and budget.',
            'es' => 'Responde a seis preguntas sencillas. Después creamos una rutina Cosm’Éthique adaptada a tu piel, preferencias y presupuesto.',
            'ar' => 'أجب عن ستة أسئلة بسيطة، ثم نبني لك روتين كوزم إيتيك مناسباً لبشرتك وتفضيلاتك وميزانيتك.',
        ),
        'Nettoie la peau sans l’agresser et prépare les soins.' => array(
            'en' => 'Cleanses the skin without stripping and prepares it for care.',
            'es' => 'Limpia la piel sin agredirla y la prepara para los cuidados.',
            'ar' => 'ينظف البشرة بلطف ويهيئها للعناية.',
        ),
        'Apporte de l’éclat et cible le manque de luminosité.' => array(
            'en' => 'Boosts radiance and targets dullness.',
            'es' => 'Aporta luminosidad y actúa sobre la falta de brillo.',
            'ar' => 'يعزز الإشراقة ويستهدف بهتان البشرة.',
        ),
        'Hydrate, apaise et soutient le confort cutané.' => array(
            'en' => 'Hydrates, soothes and supports skin comfort.',
            'es' => 'Hidrata, calma y favorece el confort cutáneo.',
            'ar' => 'يرطب ويهدئ ويدعم راحة البشرة.',
        ),
        'Rafraîchit, tonifie et affine la routine quotidienne.' => array(
            'en' => 'Refreshes, tones and refines the daily routine.',
            'es' => 'Refresca, tonifica y afina la rutina diaria.',
            'ar' => 'ينعش وينشط ويصقل الروتين اليومي.',
        ),
        'Aide à purifier la peau et lisser le grain.' => array(
            'en' => 'Helps purify the skin and smooth its texture.',
            'es' => 'Ayuda a purificar la piel y alisar su textura.',
            'ar' => 'يساعد على تنقية البشرة وتنعيم ملمسها.',
        ),
        'Nourrit intensément et enveloppe la peau de confort.' => array(
            'en' => 'Deeply nourishes and wraps the skin in comfort.',
            'es' => 'Nutre intensamente y envuelve la piel en confort.',
            'ar' => 'يغذي بعمق ويمنح البشرة راحة ناعمة.',
        ),
        'Analyse douce, résultat immédiat' => array(
            'en' => 'Gentle analysis, instant result',
            'es' => 'Análisis suave, resultado inmediato',
            'ar' => 'تحليل لطيف ونتيجة فورية',
        ),
        'Votre routine idéale' => array(
            'en' => 'Your ideal routine',
            'es' => 'Tu rutina ideal',
            'ar' => 'روتينك المثالي',
        ),
        'Pourquoi cette routine vous correspond' => array(
            'en' => 'Why this routine suits you',
            'es' => 'Por qué esta rutina te corresponde',
            'ar' => 'لماذا يناسبك هذا الروتين',
        ),
        'Pourquoi cette routine ?' => array(
            'en' => 'Why this routine?',
            'es' => '¿Por qué esta rutina?',
            'ar' => 'لماذا هذا الروتين؟',
        ),
        'Compatibilité Cosm’Éthique' => array(
            'en' => 'Cosm’Éthique compatibility',
            'es' => 'Compatibilidad Cosm’Éthique',
            'ar' => 'توافق كوزم إيثيك',
        ),
        'Voir le produit' => array(
            'en' => 'View product',
            'es' => 'Ver producto',
            'ar' => 'عرض المنتج',
        ),
        'Voir les produits' => array(
            'en' => 'View products',
            'es' => 'Ver productos',
            'ar' => 'عرض المنتجات',
        ),
        'Recommencer le diagnostic' => array(
            'en' => 'Restart the diagnostic',
            'es' => 'Reiniciar el diagnóstico',
            'ar' => 'إعادة التشخيص',
        ),
        'Ajouter toute la routine au panier' => array(
            'en' => 'Add the full routine to cart',
            'es' => 'Añadir toda la rutina al carrito',
            'ar' => 'أضف الروتين كاملاً إلى السلة',
        ),
        'Quel est votre type de peau ?' => array(
            'en' => 'What is your skin type?',
            'es' => '¿Cuál es tu tipo de piel?',
            'ar' => 'ما نوع بشرتك؟',
        ),
        'Quel est votre objectif principal ?' => array(
            'en' => 'What is your main goal?',
            'es' => '¿Cuál es tu objetivo principal?',
            'ar' => 'ما هدفك الرئيسي؟',
        ),
        'À quel moment utilisez-vous principalement vos soins ?' => array(
            'en' => 'When do you mainly use your skincare?',
            'es' => '¿Cuándo usas principalmente tus cuidados?',
            'ar' => 'متى تستخدمين العناية غالباً؟',
        ),
        'Quelle texture préférez-vous ?' => array(
            'en' => 'Which texture do you prefer?',
            'es' => '¿Qué textura prefieres?',
            'ar' => 'أي قوام تفضلين؟',
        ),
        'Quel est votre budget ?' => array(
            'en' => 'What is your budget?',
            'es' => '¿Cuál es tu presupuesto?',
            'ar' => 'ما ميزانيتك؟',
        ),
        'Souhaitez-vous une routine complète ?' => array(
            'en' => 'Would you like a complete routine?',
            'es' => '¿Quieres una rutina completa?',
            'ar' => 'هل ترغبين في روتين كامل؟',
        ),
        'Précédent' => array(
            'en' => 'Previous',
            'es' => 'Anterior',
            'ar' => 'السابق',
        ),
        'Continuer' => array(
            'en' => 'Continue',
            'es' => 'Continuar',
            'ar' => 'متابعة',
        ),
        'Voir ma routine' => array(
            'en' => 'View my routine',
            'es' => 'Ver mi rutina',
            'ar' => 'عرض روتيني',
        ),
        'Étape %1$d / %2$d' => array(
            'en' => 'Step %1$d / %2$d',
            'es' => 'Paso %1$d / %2$d',
            'ar' => 'الخطوة %1$d / %2$d',
        ),
        'Étape 1 / 6' => array(
            'en' => 'Step 1 / 6',
            'es' => 'Paso 1 / 6',
            'ar' => 'الخطوة 1 / 6',
        ),
        'Type de peau' => array(
            'en' => 'Skin type',
            'es' => 'Tipo de piel',
            'ar' => 'نوع البشرة',
        ),
        'Objectif' => array(
            'en' => 'Goal',
            'es' => 'Objetivo',
            'ar' => 'الهدف',
        ),
        'Routine' => array(
            'en' => 'Routine',
            'es' => 'Rutina',
            'ar' => 'الروتين',
        ),
        'Texture' => array(
            'en' => 'Texture',
            'es' => 'Textura',
            'ar' => 'القوام',
        ),
        'Budget' => array(
            'en' => 'Budget',
            'es' => 'Presupuesto',
            'ar' => 'الميزانية',
        ),
        'Routine complète ?' => array(
            'en' => 'Complete routine?',
            'es' => '¿Rutina completa?',
            'ar' => 'روتين كامل؟',
        ),
        'Sèche' => array(
            'en' => 'Dry',
            'es' => 'Seca',
            'ar' => 'جافة',
        ),
        'Mixte' => array(
            'en' => 'Combination',
            'es' => 'Mixta',
            'ar' => 'مختلطة',
        ),
        'Grasse' => array(
            'en' => 'Oily',
            'es' => 'Grasa',
            'ar' => 'دهنية',
        ),
        'Sensible' => array(
            'en' => 'Sensitive',
            'es' => 'Sensible',
            'ar' => 'حساسة',
        ),
        'Hydratation' => array(
            'en' => 'Hydration',
            'es' => 'Hidratación',
            'ar' => 'ترطيب',
        ),
        'Éclat' => array(
            'en' => 'Glow',
            'es' => 'Luminosidad',
            'ar' => 'إشراقة',
        ),
        'Imperfections' => array(
            'en' => 'Blemishes',
            'es' => 'Imperfecciones',
            'ar' => 'الشوائب',
        ),
        'Apaiser' => array(
            'en' => 'Soothe',
            'es' => 'Calmar',
            'ar' => 'تهدئة',
        ),
        'Anti-âge' => array(
            'en' => 'Anti-ageing',
            'es' => 'Antiedad',
            'ar' => 'مكافحة علامات التقدم',
        ),
        'Crème' => array(
            'en' => 'Cream',
            'es' => 'Crema',
            'ar' => 'كريم',
        ),
        'Gel' => array(
            'en' => 'Gel',
            'es' => 'Gel',
            'ar' => 'جل',
        ),
        'Huile' => array(
            'en' => 'Oil',
            'es' => 'Aceite',
            'ar' => 'زيت',
        ),
        'Peu importe' => array(
            'en' => 'No preference',
            'es' => 'Me da igual',
            'ar' => 'لا يهم',
        ),
        'Matin' => array(
            'en' => 'Morning',
            'es' => 'Mañana',
            'ar' => 'الصباح',
        ),
        'Soir' => array(
            'en' => 'Evening',
            'es' => 'Noche',
            'ar' => 'المساء',
        ),
        'Les deux' => array(
            'en' => 'Both',
            'es' => 'Ambos',
            'ar' => 'كلاهما',
        ),
        '<30 €' => array(
            'en' => 'Under €30',
            'es' => 'Menos de 30 €',
            'ar' => 'أقل من 30€',
        ),
        '30 à 60 €' => array(
            'en' => '€30 to €60',
            'es' => '30 a 60 €',
            'ar' => 'من 30 إلى 60€',
        ),
        '+60 €' => array(
            'en' => '€60+',
            'es' => '+60 €',
            'ar' => 'أكثر من 60€',
        ),
        'Oui' => array(
            'en' => 'Yes',
            'es' => 'Sí',
            'ar' => 'نعم',
        ),
        'Non' => array(
            'en' => 'No',
            'es' => 'No',
            'ar' => 'لا',
        ),
        'Votre résultat' => array(
            'en' => 'Your result',
            'es' => 'Tu resultado',
            'ar' => 'نتيجتك',
        ),
        'Inscription confirmée' => array(
            'en' => 'Subscription confirmed',
            'es' => 'Inscripción confirmada',
            'ar' => 'تم تأكيد الاشتراك',
        ),
        'Copié' => array(
            'en' => 'Copied',
            'es' => 'Copiado',
            'ar' => 'تم النسخ',
        ),
        'Lien copié' => array(
            'en' => 'Link copied',
            'es' => 'Enlace copiado',
            'ar' => 'تم نسخ الرابط',
        ),
        'Image produit agrandie' => array(
            'en' => 'Enlarged product image',
            'es' => 'Imagen de producto ampliada',
            'ar' => 'صورة المنتج المكبرة',
        ),
        'Fermer' => array(
            'en' => 'Close',
            'es' => 'Cerrar',
            'ar' => 'إغلاق',
        ),
        'Image précédente' => array(
            'en' => 'Previous image',
            'es' => 'Imagen anterior',
            'ar' => 'الصورة السابقة',
        ),
        'Image suivante' => array(
            'en' => 'Next image',
            'es' => 'Imagen siguiente',
            'ar' => 'الصورة التالية',
        ),
        'sèche' => array(
            'en' => 'dry',
            'es' => 'seca',
            'ar' => 'جافة',
        ),
        'mixte' => array(
            'en' => 'combination',
            'es' => 'mixta',
            'ar' => 'مختلطة',
        ),
        'grasse' => array(
            'en' => 'oily',
            'es' => 'grasa',
            'ar' => 'دهنية',
        ),
        'sensible' => array(
            'en' => 'sensitive',
            'es' => 'sensible',
            'ar' => 'حساسة',
        ),
        'équilibrée' => array(
            'en' => 'balanced',
            'es' => 'equilibrada',
            'ar' => 'متوازنة',
        ),
        'd’hydratation' => array(
            'en' => 'hydration',
            'es' => 'hidratación',
            'ar' => 'الترطيب',
        ),
        'd’éclat' => array(
            'en' => 'glow',
            'es' => 'luminosidad',
            'ar' => 'الإشراقة',
        ),
        'anti-imperfections' => array(
            'en' => 'blemish care',
            'es' => 'anti-imperfecciones',
            'ar' => 'مكافحة الشوائب',
        ),
        'anti-âge' => array(
            'en' => 'anti-ageing',
            'es' => 'antiedad',
            'ar' => 'مكافحة علامات التقدم',
        ),
        'd’apaisement' => array(
            'en' => 'soothing',
            'es' => 'calma',
            'ar' => 'التهدئة',
        ),
        'beauté naturelle' => array(
            'en' => 'natural beauty',
            'es' => 'belleza natural',
            'ar' => 'الجمال الطبيعي',
        ),
        'complet' => array(
            'en' => 'complete',
            'es' => 'completo',
            'ar' => 'كامل',
        ),
        'essentiel' => array(
            'en' => 'essential',
            'es' => 'esencial',
            'ar' => 'أساسي',
        ),
        'Cette routine répond à une peau %1$s avec un objectif %2$s. Les textures sélectionnées respectent votre préférence et composent un rituel %3$s, facile à adopter au quotidien.' => array(
            'en' => 'This routine responds to %1$s skin with a %2$s goal. The selected textures respect your preference and create a %3$s ritual that is easy to adopt every day.',
            'es' => 'Esta rutina responde a una piel %1$s con un objetivo de %2$s. Las texturas seleccionadas respetan tu preferencia y crean un ritual %3$s fácil de adoptar a diario.',
            'ar' => 'يلبي هذا الروتين احتياجات البشرة %1$s مع هدف %2$s. القوام المختار يحترم تفضيلاتك ويكوّن طقساً %3$s يسهل اعتماده يومياً.',
        ),
        'Lun-Sam 10h-19h' => array(
            'en' => 'Mon-Sat 10am-7pm',
            'es' => 'Lun-Sáb 10h-19h',
            'ar' => 'الإثنين-السبت 10:00-19:00',
        ),
        'Résultat' => array(
            'en' => 'Result',
            'es' => 'Resultado',
            'ar' => 'النتيجة',
        ),
        'Nos routines' => array(
            'en' => 'Our routines',
            'es' => 'Nuestras rutinas',
            'ar' => 'روتيناتنا',
        ),
        '98 % d’ingrédients naturels' => array(
            'en' => '98% natural ingredients',
            'es' => '98 % de ingredientes naturales',
            'ar' => '98% مكونات طبيعية',
        ),
        'Fabriqué en France' => array(
            'en' => 'Made in France',
            'es' => 'Fabricado en Francia',
            'ar' => 'صنع في فرنسا',
        ),
        'Livraison offerte dès 40 €' => array(
            'en' => 'Free delivery from €40',
            'es' => 'Envío gratis desde 40 €',
            'ar' => 'توصيل مجاني ابتداء من 40€',
        ),
        '+2500 clientes satisfaites' => array(
            'en' => '+2500 satisfied customers',
            'es' => '+2500 clientas satisfechas',
            'ar' => '+2500 عميلة راضية',
        ),
        'Livraison offerte' => array(
            'en' => 'Free delivery',
            'es' => 'Envío gratis',
            'ar' => 'توصيل مجاني',
        ),
        'dès 40 €' => array(
            'en' => 'from €40',
            'es' => 'desde 40 €',
            'ar' => 'ابتداء من 40€',
        ),
        'Naturel' => array(
            'en' => 'Natural',
            'es' => 'Natural',
            'ar' => 'طبيعي',
        ),
        'Soins du visage' => array(
            'en' => 'Face care',
            'es' => 'Cuidado facial',
            'ar' => 'العناية بالوجه',
        ),
        'Soins du corps' => array(
            'en' => 'Body care',
            'es' => 'Cuidado corporal',
            'ar' => 'العناية بالجسم',
        ),
        'Soins Cheveux' => array(
            'en' => 'Hair care',
            'es' => 'Cuidado capilar',
            'ar' => 'العناية بالشعر',
        ),
        'Accessoires Beauté' => array(
            'en' => 'Beauty accessories',
            'es' => 'Accesorios de belleza',
            'ar' => 'إكسسوارات الجمال',
        ),
        'Packs' => array(
            'en' => 'Sets',
            'es' => 'Packs',
            'ar' => 'المجموعات',
        ),
        'Promotions' => array(
            'en' => 'Offers',
            'es' => 'Promociones',
            'ar' => 'العروض',
        ),
        'Offres limitées' => array(
            'en' => 'Limited offers',
            'es' => 'Ofertas limitadas',
            'ar' => 'عروض محدودة',
        ),
        'Des routines complètes à prix doux' => array(
            'en' => 'Complete routines at softer prices',
            'es' => 'Rutinas completas a precios suaves',
            'ar' => 'روتينات كاملة بأسعار مميزة',
        ),
        'Voir tous les packs' => array(
            'en' => 'View all sets',
            'es' => 'Ver todos los packs',
            'ar' => 'عرض كل المجموعات',
        ),
        'Voir le pack' => array(
            'en' => 'View set',
            'es' => 'Ver pack',
            'ar' => 'عرض المجموعة',
        ),
        'Découvrir la collection' => array(
            'en' => 'Discover the collection',
            'es' => 'Descubrir la colección',
            'ar' => 'اكتشف المجموعة',
        ),
        'Découvrir les accessoires' => array(
            'en' => 'Discover accessories',
            'es' => 'Descubrir accesorios',
            'ar' => 'اكتشف الإكسسوارات',
        ),
        'Découvrir les packs' => array(
            'en' => 'Discover the sets',
            'es' => 'Descubrir los packs',
            'ar' => 'اكتشف المجموعات',
        ),
        'Retour à la boutique' => array(
            'en' => 'Back to shop',
            'es' => 'Volver a la tienda',
            'ar' => 'العودة إلى المتجر',
        ),
        'Ajouter au panier' => array(
            'en' => 'Add to cart',
            'es' => 'Añadir al carrito',
            'ar' => 'أضف إلى السلة',
        ),
        'Acheter maintenant' => array(
            'en' => 'Buy now',
            'es' => 'Comprar ahora',
            'ar' => 'اشتر الآن',
        ),
        'Ajouter aux favoris' => array(
            'en' => 'Add to wishlist',
            'es' => 'Añadir a favoritos',
            'ar' => 'أضف إلى المفضلة',
        ),
        'Rituel précis' => array( 'en' => 'Precise ritual', 'es' => 'Ritual preciso', 'ar' => 'طقس دقيق' ),
        'Matériaux premium' => array( 'en' => 'Premium materials', 'es' => 'Materiales premium', 'ar' => 'مواد فاخرة' ),
        'Geste doux' => array( 'en' => 'Gentle gesture', 'es' => 'Gesto suave', 'ar' => 'لمسة لطيفة' ),
        'Durable' => array( 'en' => 'Durable', 'es' => 'Duradero', 'ar' => 'متين' ),
        'Routine complète' => array( 'en' => 'Complete routine', 'es' => 'Rutina completa', 'ar' => 'روتين كامل' ),
        'Produits assortis' => array( 'en' => 'Matched products', 'es' => 'Productos combinados', 'ar' => 'منتجات متناسقة' ),
        'Prix avantageux' => array( 'en' => 'Advantageous price', 'es' => 'Precio ventajoso', 'ar' => 'سعر مميز' ),
        'Prêt à offrir' => array( 'en' => 'Ready to gift', 'es' => 'Listo para regalar', 'ar' => 'جاهز للإهداء' ),
        'Origine naturelle' => array( 'en' => 'Natural origin', 'es' => 'Origen natural', 'ar' => 'مصدر طبيعي' ),
        'Emballage recyclable' => array( 'en' => 'Recyclable packaging', 'es' => 'Envase reciclable', 'ar' => 'عبوة قابلة لإعادة التدوير' ),
        'Promo' => array(
            'en' => 'Sale',
            'es' => 'Oferta',
            'ar' => 'عرض',
        ),
        'Offre' => array(
            'en' => 'Offer',
            'es' => 'Oferta',
            'ar' => 'عرض',
        ),
        'Soin premium' => array(
            'en' => 'Premium care',
            'es' => 'Cuidado premium',
            'ar' => 'عناية فاخرة',
        ),
        'En stock' => array(
            'en' => 'In stock',
            'es' => 'En stock',
            'ar' => 'متوفر',
        ),
        'Description' => array(
            'en' => 'Description',
            'es' => 'Descripción',
            'ar' => 'الوصف',
        ),
        'Les ingrédients clés' => array(
            'en' => 'Key ingredients',
            'es' => 'Ingredientes clave',
            'ar' => 'المكونات الرئيسية',
        ),
        'Conseils d’utilisation' => array(
            'en' => 'How to use',
            'es' => 'Consejos de uso',
            'ar' => 'طريقة الاستخدام',
        ),
        'Composition' => array(
            'en' => 'Composition',
            'es' => 'Composición',
            'ar' => 'التركيبة',
        ),
        'Avis clients' => array(
            'en' => 'Customer reviews',
            'es' => 'Opiniones de clientes',
            'ar' => 'آراء العملاء',
        ),
        'Elles ont adopté COSM’ÉTHIQUE' => array(
            'en' => 'They adopted COSM’ÉTHIQUE',
            'es' => 'Ellas han adoptado COSM’ÉTHIQUE',
            'ar' => 'لقد اخترن كوزم إيثيك',
        ),
        'Questions fréquentes' => array(
            'en' => 'Frequently asked questions',
            'es' => 'Preguntas frecuentes',
            'ar' => 'الأسئلة الشائعة',
        ),
        'Tout savoir avant de commander' => array(
            'en' => 'Everything to know before ordering',
            'es' => 'Todo lo que debes saber antes de pedir',
            'ar' => 'كل ما تحتاج معرفته قبل الطلب',
        ),
        'Actifs naturels' => array(
            'en' => 'Natural actives',
            'es' => 'Activos naturales',
            'ar' => 'مكونات فعالة طبيعية',
        ),
        'Routine recommandée' => array(
            'en' => 'Recommended routine',
            'es' => 'Rutina recomendada',
            'ar' => 'روتين موصى به',
        ),
        'Complétez votre rituel beauté' => array(
            'en' => 'Complete your beauty ritual',
            'es' => 'Completa tu ritual de belleza',
            'ar' => 'أكمل طقوس جمالك',
        ),
        'Sélection associée' => array(
            'en' => 'Associated selection',
            'es' => 'Selección asociada',
            'ar' => 'اختيار مرتبط',
        ),
        'Produits similaires' => array(
            'en' => 'Similar products',
            'es' => 'Productos similares',
            'ar' => 'منتجات مشابهة',
        ),
        'Votre sélection' => array(
            'en' => 'Your selection',
            'es' => 'Tu selección',
            'ar' => 'اختياراتك',
        ),
        'Produits récemment consultés' => array(
            'en' => 'Recently viewed products',
            'es' => 'Productos vistos recientemente',
            'ar' => 'منتجات شاهدتها مؤخراً',
        ),
        'Newsletter' => array(
            'en' => 'Newsletter',
            'es' => 'Newsletter',
            'ar' => 'النشرة البريدية',
        ),
        'Je m’inscris' => array(
            'en' => 'Sign me up',
            'es' => 'Me inscribo',
            'ar' => 'أشترك',
        ),
        'Produits associés' => array(
            'en' => 'Related products',
            'es' => 'Productos relacionados',
            'ar' => 'منتجات ذات صلة',
        ),
        'Complétez votre routine.' => array(
            'en' => 'Complete your routine.',
            'es' => 'Completa tu rutina.',
            'ar' => 'أكمل روتينك.',
        ),
        'Recevez nos conseils beauté.' => array(
            'en' => 'Receive our beauty tips.',
            'es' => 'Recibe nuestros consejos de belleza.',
            'ar' => 'احصل على نصائحنا الجمالية.',
        ),
        'Des routines naturelles, des conseils d’expertes et les nouveautés COSM’ÉTHIQUE directement dans votre boîte mail.' => array(
            'en' => 'Natural routines, expert advice and COSM’ÉTHIQUE news directly in your inbox.',
            'es' => 'Rutinas naturales, consejos de expertas y novedades COSM’ÉTHIQUE directamente en tu correo.',
            'ar' => 'روتينات طبيعية ونصائح خبيرات وأخبار كوزم إيثيك مباشرة في بريدك.',
        ),
        'Ce produit convient-il aux peaux sensibles ?' => array(
            'en' => 'Is this product suitable for sensitive skin?',
            'es' => '¿Este producto es adecuado para pieles sensibles?',
            'ar' => 'هل يناسب هذا المنتج البشرة الحساسة؟',
        ),
        'Puis-je l’utiliser tous les jours ?' => array(
            'en' => 'Can I use it every day?',
            'es' => '¿Puedo usarlo todos los días?',
            'ar' => 'هل يمكنني استخدامه يومياً؟',
        ),
        'Le produit est-il cruelty free ?' => array(
            'en' => 'Is the product cruelty free?',
            'es' => '¿El producto es cruelty free?',
            'ar' => 'هل المنتج خالٍ من التجارب على الحيوانات؟',
        ),
        'Comment optimiser les résultats ?' => array(
            'en' => 'How can I optimize results?',
            'es' => '¿Cómo optimizar los resultados?',
            'ar' => 'كيف يمكن تحسين النتائج؟',
        ),
        'Je m’inscris' => array(
            'en' => 'Sign me up',
            'es' => 'Me inscribo',
            'ar' => 'أشترك',
        ),
        'S’inscrire' => array(
            'en' => 'Subscribe',
            'es' => 'Suscribirse',
            'ar' => 'اشترك',
        ),
        'Votre adresse email' => array(
            'en' => 'Your email address',
            'es' => 'Tu dirección de email',
            'ar' => 'بريدك الإلكتروني',
        ),
        'Lire l’article' => array(
            'en' => 'Read article',
            'es' => 'Leer artículo',
            'ar' => 'اقرأ المقال',
        ),
        'Voir tous les articles' => array(
            'en' => 'View all articles',
            'es' => 'Ver todos los artículos',
            'ar' => 'عرض كل المقالات',
        ),
        'Conseils & inspirations' => array(
            'en' => 'Tips & inspiration',
            'es' => 'Consejos e inspiración',
            'ar' => 'نصائح وإلهام',
        ),
        'Notre réseau de franchises' => array(
            'en' => 'Our franchise network',
            'es' => 'Nuestra red de franquicias',
            'ar' => 'شبكة الامتياز لدينا',
        ),
        'Notre réseau grandit partout en France' => array(
            'en' => 'Our network is growing across France',
            'es' => 'Nuestra red crece por toda Francia',
            'ar' => 'شبكتنا تنمو في جميع أنحاء فرنسا',
        ),
        'Boutiques ouvertes' => array(
            'en' => 'Open stores',
            'es' => 'Tiendas abiertas',
            'ar' => 'متاجر مفتوحة',
        ),
        'Villes couvertes' => array(
            'en' => 'Cities covered',
            'es' => 'Ciudades cubiertas',
            'ar' => 'مدن مغطاة',
        ),
        'Franchisés' => array(
            'en' => 'Franchisees',
            'es' => 'Franquiciados',
            'ar' => 'أصحاب الامتياز',
        ),
        'Produits naturels' => array(
            'en' => 'Natural products',
            'es' => 'Productos naturales',
            'ar' => 'منتجات طبيعية',
        ),
        'Voir la boutique' => array(
            'en' => 'View store',
            'es' => 'Ver tienda',
            'ar' => 'عرض المتجر',
        ),
        'Vous souhaitez ouvrir une franchise dans votre ville ?' => array(
            'en' => 'Would you like to open a franchise in your city?',
            'es' => '¿Quieres abrir una franquicia en tu ciudad?',
            'ar' => 'هل ترغب في فتح امتياز في مدينتك؟',
        ),
        'Envoyer ma demande' => array(
            'en' => 'Send my request',
            'es' => 'Enviar mi solicitud',
            'ar' => 'إرسال طلبي',
        ),
        'Cookies & confidentialité' => array(
            'en' => 'Cookies & privacy',
            'es' => 'Cookies y privacidad',
            'ar' => 'ملفات تعريف الارتباط والخصوصية',
        ),
        'Gestion des cookies' => array(
            'en' => 'Cookie settings',
            'es' => 'Gestión de cookies',
            'ar' => 'إدارة ملفات تعريف الارتباط',
        ),
        'Refuser' => array(
            'en' => 'Decline',
            'es' => 'Rechazar',
            'ar' => 'رفض',
        ),
        'Accepter' => array(
            'en' => 'Accept',
            'es' => 'Aceptar',
            'ar' => 'قبول',
        ),
        'Tous droits réservés.' => array(
            'en' => 'All rights reserved.',
            'es' => 'Todos los derechos reservados.',
            'ar' => 'جميع الحقوق محفوظة.',
        ),
        'Soins naturels premium, formulés avec exigence pour une beauté plus consciente.' => array(
            'en' => 'Premium natural care, formulated with high standards for more conscious beauty.',
            'es' => 'Cuidados naturales premium, formulados con exigencia para una belleza más consciente.',
            'ar' => 'عناية طبيعية فاخرة صيغت بعناية لجمال أكثر وعياً.',
        ),
        'Réseaux sociaux' => array(
            'en' => 'Social networks',
            'es' => 'Redes sociales',
            'ar' => 'الشبكات الاجتماعية',
        ),
        'Suivez-nous sur Instagram' => array(
            'en' => 'Follow us on Instagram',
            'es' => 'Síguenos en Instagram',
            'ar' => 'تابعونا على إنستغرام',
        ),
        'Suivez-nous sur Pinterest' => array(
            'en' => 'Follow us on Pinterest',
            'es' => 'Síguenos en Pinterest',
            'ar' => 'تابعونا على Pinterest',
        ),
        'Suivez-nous sur TikTok' => array(
            'en' => 'Follow us on TikTok',
            'es' => 'Síguenos en TikTok',
            'ar' => 'تابعونا على TikTok',
        ),
        'Suivez-nous' => array(
            'en' => 'Follow us',
            'es' => 'Síguenos',
            'ar' => 'تابعونا',
        ),
        'Découvrez notre univers beauté' => array(
            'en' => 'Discover our beauty universe',
            'es' => 'Descubre nuestro universo de belleza',
            'ar' => 'اكتشف عالم الجمال لدينا',
        ),
        'Ouvrir Instagram COSM’ÉTHIQUE' => array(
            'en' => 'Open COSM’ÉTHIQUE Instagram',
            'es' => 'Abrir Instagram de COSM’ÉTHIQUE',
            'ar' => 'فتح إنستغرام كوزم إيثيك',
        ),
        'Partager cet article sur Pinterest' => array(
            'en' => 'Share this article on Pinterest',
            'es' => 'Compartir este artículo en Pinterest',
            'ar' => 'شارك هذا المقال على Pinterest',
        ),
        'Ouvrir TikTok COSM’ÉTHIQUE' => array(
            'en' => 'Open COSM’ÉTHIQUE TikTok',
            'es' => 'Abrir TikTok de COSM’ÉTHIQUE',
            'ar' => 'فتح تيك توك كوزم إيثيك',
        ),
        'Tous les produits' => array(
            'en' => 'All products',
            'es' => 'Todos los productos',
            'ar' => 'كل المنتجات',
        ),
        'Soins visage' => array(
            'en' => 'Face care',
            'es' => 'Cuidado facial',
            'ar' => 'العناية بالوجه',
        ),
        'Soins corps' => array(
            'en' => 'Body care',
            'es' => 'Cuidado corporal',
            'ar' => 'العناية بالجسم',
        ),
        'Soins cheveux' => array(
            'en' => 'Hair care',
            'es' => 'Cuidado capilar',
            'ar' => 'العناية بالشعر',
        ),
        'Aromathérapie' => array(
            'en' => 'Aromatherapy',
            'es' => 'Aromaterapia',
            'ar' => 'العلاج العطري',
        ),
        'Maison' => array(
            'en' => 'House',
            'es' => 'Casa',
            'ar' => 'الدار',
        ),
        'Liens utiles' => array(
            'en' => 'Useful links',
            'es' => 'Enlaces útiles',
            'ar' => 'روابط مفيدة',
        ),
        'Nos collections' => array(
            'en' => 'Our collections',
            'es' => 'Nuestras colecciones',
            'ar' => 'مجموعاتنا',
        ),
        'À propos de Cosm’Éthique' => array(
            'en' => 'About Cosm’Éthique',
            'es' => 'Acerca de Cosm’Éthique',
            'ar' => 'عن كوزم إيثيك',
        ),
        'Informations' => array(
            'en' => 'Information',
            'es' => 'Información',
            'ar' => 'معلومات',
        ),
        'Produits' => array(
            'en' => 'Products',
            'es' => 'Productos',
            'ar' => 'المنتجات',
        ),
        'À propos' => array(
            'en' => 'About',
            'es' => 'Acerca de',
            'ar' => 'من نحن',
        ),
        'Aide & Informations' => array(
            'en' => 'Help & Information',
            'es' => 'Ayuda e información',
            'ar' => 'المساعدة والمعلومات',
        ),
        '98 % naturel · Cruelty Free · Emballages responsables' => array(
            'en' => '98% natural · Cruelty Free · Responsible packaging',
            'es' => '98 % natural · Cruelty Free · Envases responsables',
            'ar' => '98٪ طبيعي · خال من التجارب على الحيوانات · عبوات مسؤولة',
        ),
        'Paiement sécurisé · Expédition France · Cruelty free' => array(
            'en' => 'Secure payment · France shipping · Cruelty free',
            'es' => 'Pago seguro · Envío en Francia · Cruelty free',
            'ar' => 'دفع آمن · شحن داخل فرنسا · خال من التجارب على الحيوانات',
        ),
        'Paiements et fidélité' => array(
            'en' => 'Payments and loyalty',
            'es' => 'Pagos y fidelidad',
            'ar' => 'الدفع والولاء',
        ),
        'Nous écrire' => array(
            'en' => 'Write to us',
            'es' => 'Escríbenos',
            'ar' => 'راسلنا',
        ),
        'Une question sur une commande, un produit ou une routine beauté? Notre équipe vous répond avec attention.' => array(
            'en' => 'A question about an order, a product or a beauty routine? Our team will answer with care.',
            'es' => '¿Una pregunta sobre un pedido, un producto o una rutina de belleza? Nuestro equipo te responderá con atención.',
            'ar' => 'لديك سؤال عن طلب أو منتج أو روتين جمال؟ سيرد عليك فريقنا بعناية.',
        ),
        'Service client' => array(
            'en' => 'Customer service',
            'es' => 'Atención al cliente',
            'ar' => 'خدمة العملاء',
        ),
        'Du lundi au vendredi, 9h-18h' => array(
            'en' => 'Monday to Friday, 9am-6pm',
            'es' => 'De lunes a viernes, 9h-18h',
            'ar' => 'من الإثنين إلى الجمعة، 9:00-18:00',
        ),
        'Envoyer' => array(
            'en' => 'Send',
            'es' => 'Enviar',
            'ar' => 'إرسال',
        ),
        'Erreur 404 - Page non trouvée' => array(
            'en' => '404 error - Page not found',
            'es' => 'Error 404 - Página no encontrada',
            'ar' => 'خطأ 404 - الصفحة غير موجودة',
        ),
        'Désolé, la page que vous cherchez n\'existe pas ou a été supprimée.' => array(
            'en' => 'Sorry, the page you are looking for does not exist or has been removed.',
            'es' => 'Lo sentimos, la página que buscas no existe o ha sido eliminada.',
            'ar' => 'عذراً، الصفحة التي تبحث عنها غير موجودة أو تم حذفها.',
        ),
        'Articles récents' => array(
            'en' => 'Recent articles',
            'es' => 'Artículos recientes',
            'ar' => 'مقالات حديثة',
        ),
        'Aucun article trouvé.' => array(
            'en' => 'No articles found.',
            'es' => 'No se encontraron artículos.',
            'ar' => 'لم يتم العثور على مقالات.',
        ),
        'Archives' => array(
            'en' => 'Archives',
            'es' => 'Archivos',
            'ar' => 'الأرشيف',
        ),
        'Lire plus' => array(
            'en' => 'Read more',
            'es' => 'Leer más',
            'ar' => 'اقرأ المزيد',
        ),
        'Aucun contenu trouvé' => array(
            'en' => 'No content found',
            'es' => 'No se encontró contenido',
            'ar' => 'لم يتم العثور على محتوى',
        ),
        'Essayez une autre recherche ou revenez bientôt.' => array(
            'en' => 'Try another search or come back soon.',
            'es' => 'Prueba otra búsqueda o vuelve pronto.',
            'ar' => 'جرّب بحثاً آخر أو عد قريباً.',
        ),
        'Résultats pour “%s”' => array(
            'en' => 'Results for “%s”',
            'es' => 'Resultados para “%s”',
            'ar' => 'نتائج البحث عن “%s”',
        ),
        'Aucun résultat trouvé' => array(
            'en' => 'No results found',
            'es' => 'No se encontraron resultados',
            'ar' => 'لم يتم العثور على نتائج',
        ),
        'Essayez avec un autre mot-clé ou parcourez la boutique.' => array(
            'en' => 'Try another keyword or browse the shop.',
            'es' => 'Prueba con otra palabra clave o explora la tienda.',
            'ar' => 'جرّب كلمة أخرى أو تصفح المتجر.',
        ),
        'Tri des produits' => array(
            'en' => 'Product sorting',
            'es' => 'Ordenación de productos',
            'ar' => 'ترتيب المنتجات',
        ),
        'Les plus populaires' => array(
            'en' => 'Most popular',
            'es' => 'Más populares',
            'ar' => 'الأكثر شعبية',
        ),
        'Popularité' => array(
            'en' => 'Popularity',
            'es' => 'Popularidad',
            'ar' => 'الشعبية',
        ),
        'Nouveautés' => array(
            'en' => 'New arrivals',
            'es' => 'Novedades',
            'ar' => 'الجديد',
        ),
        'Prix croissant' => array(
            'en' => 'Price: low to high',
            'es' => 'Precio ascendente',
            'ar' => 'السعر من الأقل إلى الأعلى',
        ),
        'Prix décroissant' => array(
            'en' => 'Price: high to low',
            'es' => 'Precio descendente',
            'ar' => 'السعر من الأعلى إلى الأقل',
        ),
        'Les mieux notés' => array(
            'en' => 'Top rated',
            'es' => 'Mejor valorados',
            'ar' => 'الأعلى تقييماً',
        ),
        'Mieux notés' => array(
            'en' => 'Top rated',
            'es' => 'Mejor valorados',
            'ar' => 'الأعلى تقييماً',
        ),
        'Trier par :' => array(
            'en' => 'Sort by:',
            'es' => 'Ordenar por:',
            'ar' => 'ترتيب حسب:',
        ),
        'Choisir le tri des produits' => array(
            'en' => 'Choose product sorting',
            'es' => 'Elegir orden de productos',
            'ar' => 'اختر ترتيب المنتجات',
        ),
        '%s produit' => array(
            'en' => '%s product',
            'es' => '%s producto',
            'ar' => '%s منتج',
        ),
        '%s produits' => array(
            'en' => '%s products',
            'es' => '%s productos',
            'ar' => '%s منتجات',
        ),
        'Découvrez la description, les images, le prix, le code promo et l’ajout au panier.' => array(
            'en' => 'Discover the description, images, price, promo code and add-to-cart experience.',
            'es' => 'Descubre la descripción, las imágenes, el precio, el código promocional y la compra.',
            'ar' => 'اكتشف الوصف والصور والسعر وكود الخصم وإضافة المنتج إلى السلة.',
        ),
        'Conditions générales de vente' => array(
            'en' => 'Terms and conditions of sale',
            'es' => 'Condiciones generales de venta',
            'ar' => 'الشروط العامة للبيع',
        ),
        'Ce modèle est fourni comme base pour un projet étudiant. Il doit être relu et adapté par un professionnel avant mise en production.' => array(
            'en' => 'This template is provided as a basis for a student project. It should be reviewed and adapted by a professional before going live.',
            'es' => 'Este modelo se proporciona como base para un proyecto estudiantil. Debe revisarlo y adaptarlo un profesional antes de su publicación.',
            'ar' => 'يُقدّم هذا النموذج كأساس لمشروع طلابي، ويجب مراجعته وتكييفه من طرف مختص قبل النشر.',
        ),
        'Commande' => array(
            'en' => 'Order',
            'es' => 'Pedido',
            'ar' => 'الطلب',
        ),
        'Les commandes sont validées après confirmation du paiement. Le client reçoit un email récapitulatif indiquant les produits commandés, les frais et l’adresse de livraison.' => array(
            'en' => 'Orders are confirmed after payment validation. The customer receives a summary email listing the ordered products, fees and delivery address.',
            'es' => 'Los pedidos se validan tras la confirmación del pago. El cliente recibe un email recapitulativo con los productos, gastos y dirección de entrega.',
            'ar' => 'يتم تأكيد الطلبات بعد تأكيد الدفع. يتلقى العميل بريداً يلخص المنتجات المطلوبة والرسوم وعنوان التسليم.',
        ),
        'Prix et paiement' => array(
            'en' => 'Prices and payment',
            'es' => 'Precios y pago',
            'ar' => 'الأسعار والدفع',
        ),
        'Les prix sont indiqués en euros toutes taxes comprises. Les moyens de paiement sécurisés sont proposés au moment du checkout WooCommerce.' => array(
            'en' => 'Prices are shown in euros including all taxes. Secure payment methods are offered during WooCommerce checkout.',
            'es' => 'Los precios se indican en euros con impuestos incluidos. Los medios de pago seguros se proponen en el checkout WooCommerce.',
            'ar' => 'تُعرض الأسعار باليورو شاملة الضرائب. تُقترح وسائل الدفع الآمنة أثناء إتمام الطلب عبر WooCommerce.',
        ),
        'Livraison et retours' => array(
            'en' => 'Delivery and returns',
            'es' => 'Entrega y devoluciones',
            'ar' => 'التوصيل والإرجاع',
        ),
        'Les délais de livraison sont communiqués à titre indicatif. Les retours sont possibles selon les conditions prévues par la réglementation applicable.' => array(
            'en' => 'Delivery times are provided for information. Returns are possible according to applicable regulations.',
            'es' => 'Los plazos de entrega se comunican a título indicativo. Las devoluciones son posibles según la normativa aplicable.',
            'ar' => 'تُذكر آجال التسليم على سبيل الإرشاد. يمكن الإرجاع وفق الشروط التي تنص عليها القوانين المعمول بها.',
        ),
        'Conditions générales d’utilisation' => array(
            'en' => 'Terms of use',
            'es' => 'Condiciones generales de uso',
            'ar' => 'شروط الاستخدام',
        ),
        'L’utilisation du site COSM’ETHIQUE implique l’acceptation des présentes conditions. Le contenu du site est destiné à présenter la marque, ses produits et ses conseils beauté.' => array(
            'en' => 'Using the COSM’ÉTHIQUE site implies acceptance of these terms. The site content presents the brand, its products and beauty advice.',
            'es' => 'El uso del sitio COSM’ÉTHIQUE implica la aceptación de estas condiciones. El contenido presenta la marca, sus productos y consejos de belleza.',
            'ar' => 'يعني استخدام موقع كوزم إيثيك قبول هذه الشروط. يهدف محتوى الموقع إلى تقديم العلامة ومنتجاتها ونصائح الجمال.',
        ),
        'Accès au site' => array(
            'en' => 'Site access',
            'es' => 'Acceso al sitio',
            'ar' => 'الوصول إلى الموقع',
        ),
        'Le site est accessible sous réserve d’opérations de maintenance, de mises à jour ou de contraintes techniques.' => array(
            'en' => 'The site remains accessible subject to maintenance, updates or technical constraints.',
            'es' => 'El sitio es accesible salvo operaciones de mantenimiento, actualizaciones o limitaciones técnicas.',
            'ar' => 'يبقى الموقع متاحاً مع مراعاة أعمال الصيانة أو التحديثات أو القيود التقنية.',
        ),
        'Propriété intellectuelle' => array(
            'en' => 'Intellectual property',
            'es' => 'Propiedad intelectual',
            'ar' => 'الملكية الفكرية',
        ),
        'Les textes, visuels, logos et éléments graphiques sont protégés et ne peuvent être réutilisés sans autorisation.' => array(
            'en' => 'Texts, visuals, logos and graphic elements are protected and may not be reused without permission.',
            'es' => 'Los textos, imágenes, logotipos y elementos gráficos están protegidos y no pueden reutilizarse sin autorización.',
            'ar' => 'النصوص والمرئيات والشعارات والعناصر الرسومية محمية ولا يجوز إعادة استخدامها دون إذن.',
        ),
        'Mentions légales' => array(
            'en' => 'Legal notice',
            'es' => 'Aviso legal',
            'ar' => 'الإشعارات القانونية',
        ),
        'Éditeur:' => array(
            'en' => 'Publisher:',
            'es' => 'Editor:',
            'ar' => 'الناشر:',
        ),
        'Adresse:' => array(
            'en' => 'Address:',
            'es' => 'Dirección:',
            'ar' => 'العنوان:',
        ),
        'Email:' => array(
            'en' => 'Email:',
            'es' => 'Email:',
            'ar' => 'البريد الإلكتروني:',
        ),
        'Hébergement:' => array(
            'en' => 'Hosting:',
            'es' => 'Alojamiento:',
            'ar' => 'الاستضافة:',
        ),
        'À compléter selon l’hébergeur retenu.' => array(
            'en' => 'To be completed according to the selected hosting provider.',
            'es' => 'A completar según el proveedor de alojamiento elegido.',
            'ar' => 'يُستكمل حسب مزود الاستضافة المختار.',
        ),
        'Responsabilité' => array(
            'en' => 'Liability',
            'es' => 'Responsabilidad',
            'ar' => 'المسؤولية',
        ),
        'Les informations publiées sur ce site sont fournies à titre indicatif et peuvent être modifiées à tout moment.' => array(
            'en' => 'The information published on this site is provided for guidance and may be changed at any time.',
            'es' => 'La información publicada en este sitio se ofrece a título indicativo y puede modificarse en cualquier momento.',
            'ar' => 'تُقدّم المعلومات المنشورة على هذا الموقع للإرشاد ويمكن تعديلها في أي وقت.',
        ),
        'Politique de confidentialité' => array(
            'en' => 'Privacy policy',
            'es' => 'Política de privacidad',
            'ar' => 'سياسة الخصوصية',
        ),
        'COSM’ETHIQUE collecte uniquement les données nécessaires au traitement des commandes, demandes de contact et inscriptions newsletter.' => array(
            'en' => 'COSM’ÉTHIQUE only collects data required to process orders, contact requests and newsletter subscriptions.',
            'es' => 'COSM’ÉTHIQUE solo recopila los datos necesarios para procesar pedidos, solicitudes de contacto e inscripciones a la newsletter.',
            'ar' => 'تجمع كوزم إيثيك فقط البيانات اللازمة لمعالجة الطلبات وطلبات التواصل والاشتراك في النشرة.',
        ),
        'Données collectées' => array(
            'en' => 'Data collected',
            'es' => 'Datos recopilados',
            'ar' => 'البيانات المجمعة',
        ),
        'Les données peuvent inclure nom, email, adresse de livraison, historique de commande et messages transmis via les formulaires.' => array(
            'en' => 'Data may include name, email, delivery address, order history and messages sent through forms.',
            'es' => 'Los datos pueden incluir nombre, email, dirección de entrega, historial de pedidos y mensajes enviados mediante formularios.',
            'ar' => 'قد تشمل البيانات الاسم والبريد الإلكتروني وعنوان التسليم وسجل الطلبات والرسائل المرسلة عبر النماذج.',
        ),
        'Utilisation' => array(
            'en' => 'Use',
            'es' => 'Uso',
            'ar' => 'الاستخدام',
        ),
        'Les données servent à gérer les commandes, améliorer l’expérience client et envoyer des communications lorsque l’utilisateur y consent.' => array(
            'en' => 'Data is used to manage orders, improve the customer experience and send communications when the user consents.',
            'es' => 'Los datos se utilizan para gestionar pedidos, mejorar la experiencia cliente y enviar comunicaciones cuando el usuario consiente.',
            'ar' => 'تُستخدم البيانات لإدارة الطلبات وتحسين تجربة العملاء وإرسال الاتصالات عند موافقة المستخدم.',
        ),
        'Droits' => array(
            'en' => 'Rights',
            'es' => 'Derechos',
            'ar' => 'الحقوق',
        ),
        'Chaque utilisateur peut demander l’accès, la rectification ou la suppression de ses données personnelles.' => array(
            'en' => 'Each user may request access, correction or deletion of their personal data.',
            'es' => 'Cada usuario puede solicitar el acceso, la rectificación o la eliminación de sus datos personales.',
            'ar' => 'يمكن لكل مستخدم طلب الوصول إلى بياناته الشخصية أو تصحيحها أو حذفها.',
        ),
        'Programme fidélité: 1€ = 1 point beauté' => array(
            'en' => 'Loyalty program: €1 = 1 beauty point',
            'es' => 'Programa de fidelidad: 1 € = 1 punto belleza',
            'ar' => 'برنامج الولاء: 1€ = نقطة جمال واحدة',
        ),
        'Carte bancaire' => array(
            'en' => 'Credit card',
            'es' => 'Tarjeta bancaria',
            'ar' => 'بطاقة بنكية',
        ),
        'Accepter tout' => array(
            'en' => 'Accept all',
            'es' => 'Aceptar todo',
            'ar' => 'قبول الكل',
        ),
        'Personnaliser' => array(
            'en' => 'Customise',
            'es' => 'Personalizar',
            'ar' => 'تخصيص',
        ),
        'Modifier mes préférences' => array(
            'en' => 'Change my preferences',
            'es' => 'Modificar mis preferencias',
            'ar' => 'تعديل تفضيلاتي',
        ),
        'Suivi de votre commande' => array(
            'en' => 'Track your order',
            'es' => 'Seguimiento de tu pedido',
            'ar' => 'تتبع طلبك',
        ),
        'Télécharger la facture' => array(
            'en' => 'Download invoice',
            'es' => 'Descargar factura',
            'ar' => 'تحميل الفاتورة',
        ),
        'Suivre le colis' => array(
            'en' => 'Track parcel',
            'es' => 'Seguir el paquete',
            'ar' => 'تتبع الطرد',
        ),
        'Économie réalisée : %s' => array(
            'en' => 'Savings: %s',
            'es' => 'Ahorro realizado: %s',
            'ar' => 'التوفير المحقق: %s',
        ),
        'Contenu du pack' => array(
            'en' => 'Set contents',
            'es' => 'Contenido del pack',
            'ar' => 'محتوى المجموعة',
        ),
        'Livraison offerte dès 40€' => array(
            'en' => 'Free delivery from €40',
            'es' => 'Envío gratis desde 40 €',
            'ar' => 'توصيل مجاني ابتداء من 40€',
        ),
        'Formule cruelty free' => array(
            'en' => 'Cruelty-free formula',
            'es' => 'Fórmula cruelty free',
            'ar' => 'تركيبة خالية من التجارب على الحيوانات',
        ),
        'Visa · PayPal · Klarna' => array(
            'en' => 'Visa · PayPal · Klarna',
            'es' => 'Visa · PayPal · Klarna',
            'ar' => 'Visa · PayPal · Klarna',
        ),
        'Visa · Apple Pay · Google Pay' => array(
            'en' => 'Visa · Apple Pay · Google Pay',
            'es' => 'Visa · Apple Pay · Google Pay',
            'ar' => 'Visa · Apple Pay · Google Pay',
        ),
        '1€ = 1 point fidélité' => array(
            'en' => '€1 = 1 loyalty point',
            'es' => '1 € = 1 punto de fidelidad',
            'ar' => '1€ = نقطة ولاء واحدة',
        ),
        'Retours accompagnés' => array(
            'en' => 'Assisted returns',
            'es' => 'Devoluciones acompañadas',
            'ar' => 'إرجاعات بمساعدة',
        ),
        'Options de paiement' => array(
            'en' => 'Payment options',
            'es' => 'Opciones de pago',
            'ar' => 'خيارات الدفع',
        ),
        'Paiement sécurisé SSL. Avec Klarna, vous pouvez présenter une option de paiement souple selon la configuration WooCommerce.' => array(
            'en' => 'Secure SSL payment. With Klarna, you can present a flexible payment option depending on the WooCommerce configuration.',
            'es' => 'Pago seguro SSL. Con Klarna, puedes presentar una opción de pago flexible según la configuración de WooCommerce.',
            'ar' => 'دفع آمن عبر SSL. مع Klarna يمكنك عرض خيار دفع مرن حسب إعدادات WooCommerce.',
        ),
        'Moyen de paiement de démonstration pour le projet COSM’ETHIQUE.' => array(
            'en' => 'Demo payment method for the COSM’ÉTHIQUE project.',
            'es' => 'Método de pago de demostración para el proyecto COSM’ÉTHIQUE.',
            'ar' => 'وسيلة دفع تجريبية لمشروع كوزم إيثيك.',
        ),
        'Activer' => array(
            'en' => 'Enable',
            'es' => 'Activar',
            'ar' => 'تفعيل',
        ),
        'Activer ce moyen de paiement' => array(
            'en' => 'Enable this payment method',
            'es' => 'Activar este método de pago',
            'ar' => 'تفعيل وسيلة الدفع هذه',
        ),
        'Paiement de démonstration validé.' => array(
            'en' => 'Demo payment validated.',
            'es' => 'Pago de demostración validado.',
            'ar' => 'تم تأكيد الدفع التجريبي.',
        ),
        'Paiement sécurisé par carte bancaire. Option prête pour une intégration Stripe ou WooPayments.' => array(
            'en' => 'Secure payment by card. Option ready for Stripe or WooPayments integration.',
            'es' => 'Pago seguro con tarjeta. Opción lista para una integración Stripe o WooPayments.',
            'ar' => 'دفع آمن بالبطاقة. خيار جاهز للتكامل مع Stripe أو WooPayments.',
        ),
        'Paiement rapide et sécurisé avec Apple Pay. Une fois sélectionné, le bouton Apple Pay s’affiche automatiquement si votre appareil est compatible.' => array(
            'en' => 'Fast, secure payment with Apple Pay. Once selected, the Apple Pay button appears automatically if your device is compatible.',
            'es' => 'Pago rápido y seguro con Apple Pay. Una vez seleccionado, el botón Apple Pay aparece automáticamente si tu dispositivo es compatible.',
            'ar' => 'دفع سريع وآمن عبر Apple Pay. بعد اختياره، يظهر زر Apple Pay تلقائياً إذا كان جهازك متوافقاً.',
        ),
        'Paiement rapide et sécurisé avec Google Pay. Disponible sur les appareils compatibles.' => array(
            'en' => 'Fast, secure payment with Google Pay. Available on compatible devices.',
            'es' => 'Pago rápido y seguro con Google Pay. Disponible en dispositivos compatibles.',
            'ar' => 'دفع سريع وآمن عبر Google Pay. متاح على الأجهزة المتوافقة.',
        ),
        'Sélectionnez PayPal pour simuler une validation de commande via portefeuille numérique.' => array(
            'en' => 'Select PayPal to simulate order validation through a digital wallet.',
            'es' => 'Selecciona PayPal para simular una validación de pedido mediante monedero digital.',
            'ar' => 'اختر PayPal لمحاكاة تأكيد الطلب عبر محفظة رقمية.',
        ),
        'Option Klarna de démonstration pour présenter un paiement souple dans le parcours checkout.' => array(
            'en' => 'Demo Klarna option to present flexible payment during checkout.',
            'es' => 'Opción Klarna de demostración para presentar un pago flexible en el checkout.',
            'ar' => 'خيار Klarna تجريبي لعرض دفع مرن أثناء إتمام الطلب.',
        ),
        'Paiement en plusieurs fois' => array(
            'en' => 'Payment in instalments',
            'es' => 'Pago en varias cuotas',
            'ar' => 'الدفع على أقساط',
        ),
        'Présentez une option de règlement en plusieurs fois pour les paniers premium.' => array(
            'en' => 'Present an instalment payment option for premium carts.',
            'es' => 'Presenta una opción de pago en varias cuotas para carritos premium.',
            'ar' => 'اعرض خيار الدفع على أقساط للسلال الفاخرة.',
        ),
        'Votre demande n’a pas pu être validée. Merci de réessayer.' => array(
            'en' => 'Your request could not be validated. Please try again.',
            'es' => 'No se pudo validar tu solicitud. Inténtalo de nuevo.',
            'ar' => 'تعذر التحقق من طلبك. يرجى المحاولة مرة أخرى.',
        ),
        'La vérification de sécurité a échoué. Merci de réessayer.' => array(
            'en' => 'Security verification failed. Please try again.',
            'es' => 'La verificación de seguridad ha fallado. Inténtalo de nuevo.',
            'ar' => 'فشل التحقق الأمني. يرجى المحاولة مرة أخرى.',
        ),
        'La vérification de sécurité a échoué. Merci de revenir en arrière et de réessayer.' => array(
            'en' => 'Security verification failed. Please go back and try again.',
            'es' => 'La verificación de seguridad ha fallado. Vuelve atrás e inténtalo de nuevo.',
            'ar' => 'فشل التحقق الأمني. يرجى الرجوع والمحاولة مرة أخرى.',
        ),
        'Des soins naturels, sensoriels et efficaces pour révéler votre beauté avec exigence et douceur.' => array(
            'en' => 'Natural, sensorial and effective care to reveal your beauty with precision and softness.',
            'es' => 'Cuidados naturales, sensoriales y eficaces para revelar tu belleza con exigencia y suavidad.',
            'ar' => 'عناية طبيعية وحسية وفعالة لإبراز جمالك بدقة ولطف.',
        ),
        'Découvrez notre sélection de soins naturels pour hydrater, protéger et révéler l’éclat de votre peau.' => array(
            'en' => 'Discover our selection of natural care to hydrate, protect and reveal your skin’s radiance.',
            'es' => 'Descubre nuestra selección de cuidados naturales para hidratar, proteger y revelar la luminosidad de tu piel.',
            'ar' => 'اكتشف مجموعتنا من العناية الطبيعية لترطيب البشرة وحمايتها وإبراز إشراقتها.',
        ),
        'Découvrez notre sélection de soins naturels pour nourrir, hydrater et sublimer votre peau au quotidien.' => array(
            'en' => 'Discover our selection of natural care to nourish, hydrate and enhance your skin every day.',
            'es' => 'Descubre nuestra selección de cuidados naturales para nutrir, hidratar y sublimar tu piel cada día.',
            'ar' => 'اكتشف مجموعتنا من العناية الطبيعية لتغذية البشرة وترطيبها وإبراز جمالها يومياً.',
        ),
        'Découvrez notre collection de soins capillaires naturels pour nourrir, réparer et sublimer vos cheveux au quotidien.' => array(
            'en' => 'Discover our natural hair care collection to nourish, repair and enhance your hair every day.',
            'es' => 'Descubre nuestra colección de cuidados capilares naturales para nutrir, reparar y sublimar tu cabello cada día.',
            'ar' => 'اكتشف مجموعتنا الطبيعية للعناية بالشعر لتغذيته وإصلاحه وتعزيز جماله يومياً.',
        ),
        'Découvrez notre sélection d’accessoires premium pour compléter votre routine beauté avec élégance, précision et durabilité.' => array(
            'en' => 'Discover our premium accessories to complete your beauty routine with elegance, precision and durability.',
            'es' => 'Descubre nuestros accesorios premium para completar tu rutina de belleza con elegancia, precisión y durabilidad.',
            'ar' => 'اكتشف إكسسواراتنا الفاخرة لإكمال روتين الجمال بأناقة ودقة واستدامة.',
        ),
        'Découvrez nos routines prêtes à l’emploi, pensées pour répondre à tous les besoins de votre peau et de vos cheveux.' => array(
            'en' => 'Discover our ready-to-use routines designed for every skin and hair need.',
            'es' => 'Descubre nuestras rutinas listas para usar, pensadas para todas las necesidades de tu piel y tu cabello.',
            'ar' => 'اكتشف روتيناتنا الجاهزة المصممة لتلبية احتياجات البشرة والشعر.',
        ),
        'Collection visage' => array(
            'en' => 'Face collection',
            'es' => 'Colección facial',
            'ar' => 'مجموعة الوجه',
        ),
        'Collection corps' => array(
            'en' => 'Body collection',
            'es' => 'Colección corporal',
            'ar' => 'مجموعة الجسم',
        ),
        'Collection cheveux' => array(
            'en' => 'Hair collection',
            'es' => 'Colección capilar',
            'ar' => 'مجموعة الشعر',
        ),
        'Collection accessoires' => array(
            'en' => 'Accessories collection',
            'es' => 'Colección de accesorios',
            'ar' => 'مجموعة الإكسسوارات',
        ),
        'Routines prêtes à l’emploi' => array(
            'en' => 'Ready-to-use routines',
            'es' => 'Rutinas listas para usar',
            'ar' => 'روتينات جاهزة',
        ),
        '6 essentiels pour une routine naturelle' => array(
            'en' => '6 essentials for a natural routine',
            'es' => '6 esenciales para una rutina natural',
            'ar' => '6 أساسيات لروتين طبيعي',
        ),
        '6 soins naturels pour une peau douce' => array(
            'en' => '6 natural care products for soft skin',
            'es' => '6 cuidados naturales para una piel suave',
            'ar' => '6 منتجات طبيعية لبشرة ناعمة',
        ),
        '6 rituels naturels pour sublimer la fibre' => array(
            'en' => '6 natural rituals to enhance the hair fibre',
            'es' => '6 rituales naturales para sublimar la fibra capilar',
            'ar' => '6 طقوس طبيعية لتعزيز ألياف الشعر',
        ),
        '6 essentiels premium pour votre routine' => array(
            'en' => '6 premium essentials for your routine',
            'es' => '6 esenciales premium para tu rutina',
            'ar' => '6 أساسيات فاخرة لروتينك',
        ),
        '4 coffrets pour simplifier votre routine' => array(
            'en' => '4 sets to simplify your routine',
            'es' => '4 cofres para simplificar tu rutina',
            'ar' => '4 مجموعات لتبسيط روتينك',
        ),
        'Routine conseillée' => array(
            'en' => 'Recommended routine',
            'es' => 'Rutina recomendada',
            'ar' => 'روتين موصى به',
        ),
        'Avantage pack' => array(
            'en' => 'Set benefit',
            'es' => 'Ventaja del pack',
            'ar' => 'ميزة المجموعة',
        ),
        'Nettoyer, tonifier, hydrater, sublimer.' => array(
            'en' => 'Cleanse, tone, hydrate, enhance.',
            'es' => 'Limpiar, tonificar, hidratar, sublimar.',
            'ar' => 'تنظيف، تنشيط، ترطيب، إبراز الجمال.',
        ),
        'Exfolier, nourrir, hydrater, sublimer.' => array(
            'en' => 'Exfoliate, nourish, hydrate, enhance.',
            'es' => 'Exfoliar, nutrir, hidratar, sublimar.',
            'ar' => 'تقشير، تغذية، ترطيب، إبراز الجمال.',
        ),
        'Nettoyer, réparer, protéger, illuminer.' => array(
            'en' => 'Cleanse, repair, protect, illuminate.',
            'es' => 'Limpiar, reparar, proteger, iluminar.',
            'ar' => 'تنظيف، إصلاح، حماية، إشراق.',
        ),
        'Nettoyer, masser, organiser, sublimer.' => array(
            'en' => 'Cleanse, massage, organise, enhance.',
            'es' => 'Limpiar, masajear, organizar, sublimar.',
            'ar' => 'تنظيف، تدليك، تنظيم، إبراز الجمال.',
        ),
        'Des routines complètes, élégantes et plus avantageuses.' => array(
            'en' => 'Complete, elegant and better-value routines.',
            'es' => 'Rutinas completas, elegantes y más ventajosas.',
            'ar' => 'روتينات كاملة وأنيقة وأكثر فائدة.',
        ),
        'Profitez d’une sélection de soins premium à prix doux pendant quelques jours.' => array(
            'en' => 'Enjoy a selection of premium care at softer prices for a limited time.',
            'es' => 'Disfruta de una selección de cuidados premium a precios suaves por tiempo limitado.',
            'ar' => 'استمتع بمجموعة مختارة من العناية الفاخرة بأسعار مميزة لفترة محدودة.',
        ),
        'Jours' => array(
            'en' => 'Days',
            'es' => 'Días',
            'ar' => 'أيام',
        ),
        'Heures' => array(
            'en' => 'Hours',
            'es' => 'Horas',
            'ar' => 'ساعات',
        ),
        'Min' => array(
            'en' => 'Min',
            'es' => 'Min',
            'ar' => 'دقائق',
        ),
        'Sec' => array(
            'en' => 'Sec',
            'es' => 'Seg',
            'ar' => 'ثوان',
        ),
        'Nourrit intensément les peaux sèches et restaure le confort cutané.' => array(
            'en' => 'Deeply nourishes dry skin and restores skin comfort.',
            'es' => 'Nutre intensamente las pieles secas y restaura el confort cutáneo.',
            'ar' => 'يغذي البشرة الجافة بعمق ويعيد إليها الراحة.',
        ),
        'Nourrit, satine et sublime la peau sans laisser de film gras.' => array(
            'en' => 'Nourishes, satins and enhances the skin without a greasy film.',
            'es' => 'Nutre, satina y realza la piel sin dejar película grasa.',
            'ar' => 'يغذي البشرة ويمنحها لمعاناً ناعماً دون طبقة دهنية.',
        ),
        'Exfolie délicatement et laisse la peau douce et lumineuse.' => array(
            'en' => 'Gently exfoliates and leaves skin soft and luminous.',
            'es' => 'Exfolia suavemente y deja la piel suave y luminosa.',
            'ar' => 'يقشر بلطف ويترك البشرة ناعمة ومشرقة.',
        ),
        'Hydrate durablement les peaux normales à sèches.' => array(
            'en' => 'Provides lasting hydration for normal to dry skin.',
            'es' => 'Hidrata duraderamente las pieles normales a secas.',
            'ar' => 'يوفر ترطيباً طويل الأمد للبشرة العادية إلى الجافة.',
        ),
        'Nettoie en douceur tout en respectant l’équilibre naturel de la peau.' => array(
            'en' => 'Gently cleanses while respecting the skin’s natural balance.',
            'es' => 'Limpia suavemente respetando el equilibrio natural de la piel.',
            'ar' => 'ينظف بلطف مع احترام توازن البشرة الطبيعي.',
        ),
        'Nettoie délicatement les cheveux tout en respectant le cuir chevelu.' => array(
            'en' => 'Gently cleanses hair while respecting the scalp.',
            'es' => 'Limpia suavemente el cabello respetando el cuero cabelludo.',
            'ar' => 'ينظف الشعر بلطف مع احترام فروة الرأس.',
        ),
        'Répare les longueurs et nourrit intensément la fibre capillaire.' => array(
            'en' => 'Repairs lengths and deeply nourishes the hair fibre.',
            'es' => 'Repara los largos y nutre intensamente la fibra capilar.',
            'ar' => 'يرمم الأطوال ويغذي ألياف الشعر بعمق.',
        ),
        'Apporte brillance et nutrition sans alourdir les cheveux.' => array(
            'en' => 'Adds shine and nourishment without weighing hair down.',
            'es' => 'Aporta brillo y nutrición sin apelmazar el cabello.',
            'ar' => 'يمنح اللمعان والتغذية دون إثقال الشعر.',
        ),
        'Démêle instantanément et protège les cheveux.' => array(
            'en' => 'Instantly detangles and protects hair.',
            'es' => 'Desenreda al instante y protege el cabello.',
            'ar' => 'يفك التشابك فوراً ويحمي الشعر.',
        ),
        'Protège les cheveux avant le séchage ou le lissage.' => array(
            'en' => 'Protects hair before blow-drying or straightening.',
            'es' => 'Protege el cabello antes del secado o alisado.',
            'ar' => 'يحمي الشعر قبل التجفيف أو الفرد.',
        ),
        'Nettoie délicatement la peau et élimine les impuretés.' => array(
            'en' => 'Gently cleanses skin and removes impurities.',
            'es' => 'Limpia delicadamente la piel y elimina impurezas.',
            'ar' => 'ينظف البشرة بلطف ويزيل الشوائب.',
        ),
        'Démêle les cheveux tout en respectant la fibre capillaire.' => array(
            'en' => 'Detangles hair while respecting the hair fibre.',
            'es' => 'Desenreda el cabello respetando la fibra capilar.',
            'ar' => 'يفك تشابك الشعر مع احترام أليافه.',
        ),
        'Stimule la microcirculation et raffermit la peau.' => array(
            'en' => 'Stimulates microcirculation and firms the skin.',
            'es' => 'Estimula la microcirculación y reafirma la piel.',
            'ar' => 'ينشط الدورة الدقيقة ويشد البشرة.',
        ),
        'Apaise la peau et réduit les poches.' => array(
            'en' => 'Soothes the skin and reduces puffiness.',
            'es' => 'Calma la piel y reduce las bolsas.',
            'ar' => 'يهدئ البشرة ويخفف الانتفاخ.',
        ),
        'Transportez vos essentiels dans une trousse élégante et durable.' => array(
            'en' => 'Carry your essentials in an elegant, durable pouch.',
            'es' => 'Transporta tus esenciales en un neceser elegante y duradero.',
            'ar' => 'احمل أساسياتك في حقيبة أنيقة ومتينة.',
        ),
        'Le duo idéal pour vos massages visage et votre routine bien-être.' => array(
            'en' => 'The ideal duo for facial massage and wellness rituals.',
            'es' => 'El dúo ideal para tus masajes faciales y tu rutina bienestar.',
            'ar' => 'الثنائي المثالي لتدليك الوجه وروتين العناية.',
        ),
        'Notre réseau grandit partout en France' => array(
            'en' => 'Our network is growing across France',
            'es' => 'Nuestra red crece por toda Francia',
            'ar' => 'شبكتنا تنمو في جميع أنحاء فرنسا',
        ),
        'Rejoignez un réseau de boutiques engagées dans la cosmétique naturelle. Découvrez les villes déjà implantées et les opportunités encore disponibles.' => array(
            'en' => 'Join a network of boutiques committed to natural cosmetics. Discover the cities already open and the opportunities still available.',
            'es' => 'Únete a una red de tiendas comprometidas con la cosmética natural. Descubre las ciudades implantadas y las oportunidades disponibles.',
            'ar' => 'انضم إلى شبكة متاجر ملتزمة بمستحضرات التجميل الطبيعية. اكتشف المدن المفتوحة والفرص المتاحة.',
        ),
        'Ouvrir une adresse COSM’ETHIQUE' => array(
            'en' => 'Open a COSM’ÉTHIQUE store',
            'es' => 'Abrir una tienda COSM’ÉTHIQUE',
            'ar' => 'افتح متجر كوزم إيثيك',
        ),
        'Nous recherchons des partenaires sensibles à la beauté naturelle, au conseil client et à l’expérience retail premium.' => array(
            'en' => 'We are looking for partners who value natural beauty, customer guidance and a premium retail experience.',
            'es' => 'Buscamos socios sensibles a la belleza natural, al asesoramiento cliente y a una experiencia retail premium.',
            'ar' => 'نبحث عن شركاء يهتمون بالجمال الطبيعي وخدمة العملاء وتجربة البيع الفاخرة.',
        ),
        'Demande d’information franchisé' => array(
            'en' => 'Franchise information request',
            'es' => 'Solicitud de información franquicia',
            'ar' => 'طلب معلومات الامتياز',
        ),
        'Nom complet' => array(
            'en' => 'Full name',
            'es' => 'Nombre completo',
            'ar' => 'الاسم الكامل',
        ),
        'Téléphone' => array(
            'en' => 'Phone',
            'es' => 'Teléfono',
            'ar' => 'الهاتف',
        ),
        'Ville souhaitée' => array(
            'en' => 'Desired city',
            'es' => 'Ciudad deseada',
            'ar' => 'المدينة المطلوبة',
        ),
        'Apport estimé' => array(
            'en' => 'Estimated investment',
            'es' => 'Aportación estimada',
            'ar' => 'الاستثمار المتوقع',
        ),
        'Choisir une tranche' => array(
            'en' => 'Choose a range',
            'es' => 'Elegir un rango',
            'ar' => 'اختر فئة',
        ),
        'Moins de 20 000€' => array(
            'en' => 'Less than €20,000',
            'es' => 'Menos de 20 000 €',
            'ar' => 'أقل من 20,000€',
        ),
        '20 000€ à 50 000€' => array(
            'en' => '€20,000 to €50,000',
            'es' => '20 000 € a 50 000 €',
            'ar' => 'من 20,000€ إلى 50,000€',
        ),
        '50 000€ à 100 000€' => array(
            'en' => '€50,000 to €100,000',
            'es' => '50 000 € a 100 000 €',
            'ar' => 'من 50,000€ إلى 100,000€',
        ),
        'Plus de 100 000€' => array(
            'en' => 'More than €100,000',
            'es' => 'Más de 100 000 €',
            'ar' => 'أكثر من 100,000€',
        ),
        'Expérience retail / beauté' => array(
            'en' => 'Retail / beauty experience',
            'es' => 'Experiencia retail / belleza',
            'ar' => 'خبرة البيع / الجمال',
        ),
        'Message' => array(
            'en' => 'Message',
            'es' => 'Mensaje',
            'ar' => 'الرسالة',
        ),
        'produits signature au lancement' => array(
            'en' => 'signature products at launch',
            'es' => 'productos emblemáticos en el lanzamiento',
            'ar' => 'منتجات مميزة عند الإطلاق',
        ),
        'seuil de livraison offerte' => array(
            'en' => 'free delivery threshold',
            'es' => 'umbral de envío gratuito',
            'ar' => 'حد التوصيل المجاني',
        ),
        'délai d’expédition cible' => array(
            'en' => 'target dispatch time',
            'es' => 'plazo de expedición objetivo',
            'ar' => 'مدة الإرسال المستهدفة',
        ),
        'satisfaction client visée' => array(
            'en' => 'target customer satisfaction',
            'es' => 'satisfacción cliente objetivo',
            'ar' => 'رضا العملاء المستهدف',
        ),
        'Concept boutique élégant et duplicable' => array(
            'en' => 'Elegant, repeatable boutique concept',
            'es' => 'Concepto de boutique elegante y replicable',
            'ar' => 'مفهوم متجر أنيق وقابل للتكرار',
        ),
        'Accompagnement lancement, merchandising et formation' => array(
            'en' => 'Launch, merchandising and training support',
            'es' => 'Acompañamiento en lanzamiento, merchandising y formación',
            'ar' => 'دعم الإطلاق والعرض والتدريب',
        ),
        'Catalogue naturel premium et stratégie ecommerce' => array(
            'en' => 'Premium natural catalogue and ecommerce strategy',
            'es' => 'Catálogo natural premium y estrategia ecommerce',
            'ar' => 'كتالوج طبيعي فاخر واستراتيجية تجارة إلكترونية',
        ),
        'Supports marketing et animation locale' => array(
            'en' => 'Marketing assets and local activation',
            'es' => 'Soportes marketing y animación local',
            'ar' => 'مواد تسويقية وتنشيط محلي',
        ),
        'J’accepte d’être contacté au sujet de ma demande de franchise.' => array(
            'en' => 'I agree to be contacted about my franchise request.',
            'es' => 'Acepto ser contactado sobre mi solicitud de franquicia.',
            'ar' => 'أوافق على التواصل معي بخصوص طلب الامتياز.',
        ),
        'Nous utilisons des cookies pour améliorer votre expérience, mesurer l’audience et personnaliser la boutique COSM’ETHIQUE.' => array(
            'en' => 'We use cookies to improve your experience, measure traffic and personalise the COSM’ÉTHIQUE shop.',
            'es' => 'Usamos cookies para mejorar tu experiencia, medir la audiencia y personalizar la tienda COSM’ÉTHIQUE.',
            'ar' => 'نستخدم ملفات تعريف الارتباط لتحسين تجربتك وقياس الزيارات وتخصيص متجر كوزم إيثيك.',
        ),
        'Voir le panier' => array(
            'en' => 'View cart',
            'es' => 'Ver carrito',
            'ar' => 'عرض السلة',
        ),
        'Commander' => array(
            'en' => 'Checkout',
            'es' => 'Finalizar compra',
            'ar' => 'إتمام الطلب',
        ),
        'Valider la commande' => array(
            'en' => 'Place order',
            'es' => 'Realizar pedido',
            'ar' => 'تأكيد الطلب',
        ),
        'Votre commande' => array(
            'en' => 'Your order',
            'es' => 'Tu pedido',
            'ar' => 'طلبك',
        ),
        'Détails de facturation' => array(
            'en' => 'Billing details',
            'es' => 'Datos de facturación',
            'ar' => 'بيانات الفوترة',
        ),
        'Expédition' => array(
            'en' => 'Shipping',
            'es' => 'Envío',
            'ar' => 'الشحن',
        ),
        'Total' => array(
            'en' => 'Total',
            'es' => 'Total',
            'ar' => 'الإجمالي',
        ),
        'Sous-total' => array(
            'en' => 'Subtotal',
            'es' => 'Subtotal',
            'ar' => 'المجموع الفرعي',
        ),
        'Produit' => array(
            'en' => 'Product',
            'es' => 'Producto',
            'ar' => 'المنتج',
        ),
        'Prix' => array(
            'en' => 'Price',
            'es' => 'Precio',
            'ar' => 'السعر',
        ),
        'Quantité' => array(
            'en' => 'Quantity',
            'es' => 'Cantidad',
            'ar' => 'الكمية',
        ),
        'Appliquer le code promo' => array(
            'en' => 'Apply coupon',
            'es' => 'Aplicar cupón',
            'ar' => 'تطبيق كود الخصم',
        ),
        'Code promo' => array(
            'en' => 'Coupon code',
            'es' => 'Código promocional',
            'ar' => 'كود الخصم',
        ),
        'Mettre à jour le panier' => array(
            'en' => 'Update cart',
            'es' => 'Actualizar carrito',
            'ar' => 'تحديث السلة',
        ),
        'Continuer vos achats' => array(
            'en' => 'Continue shopping',
            'es' => 'Seguir comprando',
            'ar' => 'متابعة التسوق',
        ),
        'Adresse e-mail' => array(
            'en' => 'Email address',
            'es' => 'Dirección de email',
            'ar' => 'البريد الإلكتروني',
        ),
        'Adresse email' => array(
            'en' => 'Email address',
            'es' => 'Dirección de email',
            'ar' => 'البريد الإلكتروني',
        ),
        'Prénom' => array(
            'en' => 'First name',
            'es' => 'Nombre',
            'ar' => 'الاسم الأول',
        ),
        'Nom' => array(
            'en' => 'Last name',
            'es' => 'Apellido',
            'ar' => 'اسم العائلة',
        ),
        'Adresse' => array(
            'en' => 'Address',
            'es' => 'Dirección',
            'ar' => 'العنوان',
        ),
        'Ville' => array(
            'en' => 'City',
            'es' => 'Ciudad',
            'ar' => 'المدينة',
        ),
        'Code postal' => array(
            'en' => 'Postcode',
            'es' => 'Código postal',
            'ar' => 'الرمز البريدي',
        ),
        'Pays' => array(
            'en' => 'Country',
            'es' => 'País',
            'ar' => 'البلد',
        ),
        'Créer un compte ?' => array(
            'en' => 'Create an account?',
            'es' => '¿Crear una cuenta?',
            'ar' => 'إنشاء حساب؟',
        ),
        'Connexion' => array(
            'en' => 'Login',
            'es' => 'Iniciar sesión',
            'ar' => 'تسجيل الدخول',
        ),
        'Mot de passe' => array(
            'en' => 'Password',
            'es' => 'Contraseña',
            'ar' => 'كلمة المرور',
        ),
        'Se souvenir de moi' => array(
            'en' => 'Remember me',
            'es' => 'Recordarme',
            'ar' => 'تذكرني',
        ),
        'Mot de passe perdu ?' => array(
            'en' => 'Lost your password?',
            'es' => '¿Olvidaste tu contraseña?',
            'ar' => 'هل نسيت كلمة المرور؟',
        ),
        'Cosmétiques naturels premium' => array(
            'en' => 'Premium natural cosmetics',
            'es' => 'Cosmética natural premium',
            'ar' => 'مستحضرات تجميل طبيعية فاخرة',
        ),
        'Révélez la beauté naturelle de votre peau' => array(
            'en' => 'Reveal your skin’s natural beauty',
            'es' => 'Revela la belleza natural de tu piel',
            'ar' => 'اكتشفي الجمال الطبيعي لبشرتك',
        ),
        'Des soins sensoriels, exigeants et responsables, imaginés pour les peaux qui veulent de l’efficacité sans compromis.' => array(
            'en' => 'Sensorial, refined and responsible care created for skin that wants effectiveness without compromise.',
            'es' => 'Cuidados sensoriales, exigentes y responsables para pieles que buscan eficacia sin compromiso.',
            'ar' => 'عناية حسية ومتقنة ومسؤولة صممت للبشرة التي تبحث عن الفعالية دون تنازل.',
        ),
        'Découvrir la boutique' => array(
            'en' => 'Discover the shop',
            'es' => 'Descubrir la tienda',
            'ar' => 'اكتشف المتجر',
        ),
        'Notre vision' => array(
            'en' => 'Our vision',
            'es' => 'Nuestra visión',
            'ar' => 'رؤيتنا',
        ),
        'Plus de 4 800 routines beauté adoptées.' => array(
            'en' => 'More than 4,800 beauty routines adopted.',
            'es' => 'Más de 4 800 rutinas de belleza adoptadas.',
            'ar' => 'أكثر من 4,800 روتين جمال تم اعتماده.',
        ),
        'Rituels ciblés' => array(
            'en' => 'Targeted rituals',
            'es' => 'Rituales específicos',
            'ar' => 'طقوس موجهة',
        ),
        'Choisissez votre catégorie' => array(
            'en' => 'Choose your category',
            'es' => 'Elige tu categoría',
            'ar' => 'اختر الفئة',
        ),
        'Cliquez sur une famille de soins pour afficher les produits correspondants.' => array(
            'en' => 'Click a care family to display the matching products.',
            'es' => 'Haz clic en una familia de cuidados para ver los productos correspondientes.',
            'ar' => 'انقر على فئة العناية لعرض المنتجات المناسبة.',
        ),
        'Tous les soins' => array(
            'en' => 'All care',
            'es' => 'Todos los cuidados',
            'ar' => 'كل منتجات العناية',
        ),
        'Voir toute la sélection COSM’ETHIQUE' => array(
            'en' => 'View the full COSM’ÉTHIQUE selection',
            'es' => 'Ver toda la selección COSM’ÉTHIQUE',
            'ar' => 'عرض كامل تشكيلة كوزم إيثيك',
        ),
        'Best sellers' => array(
            'en' => 'Best sellers',
            'es' => 'Más vendidos',
            'ar' => 'الأكثر مبيعاً',
        ),
        'Les essentiels COSM’ETHIQUE' => array(
            'en' => 'COSM’ÉTHIQUE essentials',
            'es' => 'Los esenciales COSM’ÉTHIQUE',
            'ar' => 'أساسيات كوزم إيثيك',
        ),
        'Voir tous les produits' => array(
            'en' => 'View all products',
            'es' => 'Ver todos los productos',
            'ar' => 'عرض كل المنتجات',
        ),
        'Nouvelle collection' => array(
            'en' => 'New collection',
            'es' => 'Nueva colección',
            'ar' => 'مجموعة جديدة',
        ),
        'Une routine éclat autour de la rose, du calendula et de l’acide hyaluronique végétal.' => array(
            'en' => 'A radiance routine built around rose, calendula and botanical hyaluronic acid.',
            'es' => 'Una rutina luminosidad con rosa, caléndula y ácido hialurónico vegetal.',
            'ar' => 'روتين إشراقة يعتمد على الورد والآذريون وحمض الهيالورونيك النباتي.',
        ),
        'Découvrir' => array(
            'en' => 'Discover',
            'es' => 'Descubrir',
            'ar' => 'اكتشف',
        ),
        'Offre promotionnelle' => array(
            'en' => 'Special offer',
            'es' => 'Oferta promocional',
            'ar' => 'عرض ترويجي',
        ),
        '-20% sur les sérums' => array(
            'en' => '-20% on serums',
            'es' => '-20 % en sérums',
            'ar' => 'خصم 20% على السيرومات',
        ),
        'Composez une routine concentrée en actifs naturels pour une peau lumineuse.' => array(
            'en' => 'Create a routine concentrated in natural active ingredients for luminous skin.',
            'es' => 'Crea una rutina concentrada en activos naturales para una piel luminosa.',
            'ar' => 'كوّن روتيناً غنياً بالمكونات الطبيعية الفعالة لبشرة مشرقة.',
        ),
        'Profiter' => array(
            'en' => 'Shop offer',
            'es' => 'Aprovechar',
            'ar' => 'استفد من العرض',
        ),
        'Notre vision de la beauté' => array(
            'en' => 'Our vision of beauty',
            'es' => 'Nuestra visión de la belleza',
            'ar' => 'رؤيتنا للجمال',
        ),
        'Formuler moins, formuler mieux.' => array(
            'en' => 'Formulate less, formulate better.',
            'es' => 'Formular menos, formular mejor.',
            'ar' => 'تركيبات أقل، جودة أفضل.',
        ),
        'COSM’ETHIQUE défend une beauté précise, naturelle et sensorielle. Chaque formule associe actifs botaniques, textures raffinées et traçabilité exigeante pour respecter la peau autant que la planète.' => array(
            'en' => 'COSM’ÉTHIQUE stands for precise, natural and sensorial beauty. Each formula combines botanical actives, refined textures and demanding traceability to respect both skin and planet.',
            'es' => 'COSM’ÉTHIQUE defiende una belleza precisa, natural y sensorial. Cada fórmula combina activos botánicos, texturas refinadas y trazabilidad exigente para respetar la piel y el planeta.',
            'ar' => 'تدافع كوزم إيثيك عن جمال دقيق وطبيعي وحسي. تجمع كل تركيبة بين مكونات نباتية فعالة وقوام راق وتتبع صارم لاحترام البشرة والكوكب.',
        ),
        'Notre ambition: rendre les rituels premium plus responsables, sans renoncer au plaisir, à l’efficacité ni à l’élégance.' => array(
            'en' => 'Our ambition: make premium rituals more responsible without giving up pleasure, effectiveness or elegance.',
            'es' => 'Nuestra ambición: hacer que los rituales premium sean más responsables sin renunciar al placer, la eficacia ni la elegancia.',
            'ar' => 'طموحنا هو جعل الطقوس الفاخرة أكثر مسؤولية دون التخلي عن المتعة أو الفعالية أو الأناقة.',
        ),
        'Découvrir la marque' => array(
            'en' => 'Discover the brand',
            'es' => 'Descubrir la marca',
            'ar' => 'اكتشف العلامة',
        ),
        'Des routines qui changent tout' => array(
            'en' => 'Routines that change everything',
            'es' => 'Rutinas que lo cambian todo',
            'ar' => 'روتينات تصنع الفرق',
        ),
        'Le sérum à la rose a remplacé trois produits dans ma routine. Ma peau est plus souple, plus lumineuse.' => array(
            'en' => 'The rose serum replaced three products in my routine. My skin feels softer and brighter.',
            'es' => 'El sérum de rosa sustituyó tres productos de mi rutina. Mi piel está más flexible y luminosa.',
            'ar' => 'استبدل سيروم الورد ثلاثة منتجات في روتيني. أصبحت بشرتي أنعم وأكثر إشراقاً.',
        ),
        'Des textures sublimes, une livraison rapide et une vraie cohérence écologique. La marque fait très premium.' => array(
            'en' => 'Beautiful textures, fast delivery and a truly coherent ecological approach. The brand feels very premium.',
            'es' => 'Texturas sublimes, entrega rápida y una coherencia ecológica real. La marca se siente muy premium.',
            'ar' => 'قوام رائع وتوصيل سريع ونهج بيئي متناسق حقاً. العلامة تبدو فاخرة جداً.',
        ),
        'L’huile sèche est devenue mon geste préféré après la douche. Elle sent bon, pénètre vite, et le flacon est magnifique.' => array(
            'en' => 'The dry oil has become my favourite post-shower step. It smells beautiful, absorbs quickly and the bottle is gorgeous.',
            'es' => 'El aceite seco se ha convertido en mi gesto favorito después de la ducha. Huele bien, se absorbe rápido y el frasco es precioso.',
            'ar' => 'أصبح الزيت الجاف خطوتي المفضلة بعد الاستحمام. رائحته جميلة ويمتص بسرعة وعبوته رائعة.',
        ),
        'Le blog' => array(
            'en' => 'The blog',
            'es' => 'El blog',
            'ar' => 'المدونة',
        ),
        'Des contenus experts pour prendre soin de vous naturellement et adopter une routine beauté saine et responsable.' => array(
            'en' => 'Expert content to care for yourself naturally and adopt a healthy, responsible beauty routine.',
            'es' => 'Contenidos expertos para cuidarte naturalmente y adoptar una rutina de belleza sana y responsable.',
            'ar' => 'محتوى خبير للعناية بنفسك طبيعياً واعتماد روتين جمال صحي ومسؤول.',
        ),
        'Recevez nos rituels, lancements et offres privées.' => array(
            'en' => 'Receive our rituals, launches and private offers.',
            'es' => 'Recibe nuestros rituales, lanzamientos y ofertas privadas.',
            'ar' => 'احصل على طقوسنا وإطلاقاتنا وعروضنا الخاصة.',
        ),
        'Vos données restent confidentielles.' => array(
            'en' => 'Your data remains confidential.',
            'es' => 'Tus datos siguen siendo confidenciales.',
            'ar' => 'تبقى بياناتك سرية.',
        ),
        'Notre Histoire' => array(
            'en' => 'Our Story',
            'es' => 'Nuestra historia',
            'ar' => 'قصتنا',
        ),
        'Une beauté naturelle pensée autrement' => array(
            'en' => 'Natural beauty, reimagined',
            'es' => 'Una belleza natural pensada de otra manera',
            'ar' => 'جمال طبيعي برؤية مختلفة',
        ),
        'COSM’ETHIQUE est née d’une envie simple: réconcilier l’exigence d’un soin premium avec une approche plus naturelle, plus lisible et plus responsable de la beauté.' => array(
            'en' => 'COSM’ÉTHIQUE was born from a simple ambition: to reconcile premium skincare standards with a more natural, clearer and more responsible vision of beauty.',
            'es' => 'COSM’ÉTHIQUE nació de un deseo simple: reconciliar la exigencia de un cuidado premium con una visión más natural, clara y responsable de la belleza.',
            'ar' => 'وُلدت كوزم إيثيك من رغبة بسيطة: الجمع بين معايير العناية الفاخرة ورؤية أكثر طبيعية ووضوحاً ومسؤولية للجمال.',
        ),
        'La marque imagine des rituels sensoriels, conçus pour accompagner les gestes du quotidien sans multiplier les étapes. Chaque formule met en avant des actifs botaniques choisis avec précision, des textures élégantes et une identité visuelle qui transforme la salle de bain en véritable espace de soin.' => array(
            'en' => 'The brand designs sensorial rituals created to support everyday gestures without multiplying steps. Each formula highlights precisely chosen botanical actives, elegant textures and a visual identity that turns the bathroom into a true care space.',
            'es' => 'La marca imagina rituales sensoriales pensados para acompañar los gestos diarios sin multiplicar los pasos. Cada fórmula destaca activos botánicos seleccionados con precisión, texturas elegantes y una identidad visual que transforma el baño en un verdadero espacio de cuidado.',
            'ar' => 'تصمم العلامة طقوساً حسية ترافق العناية اليومية دون تعقيد الخطوات. تبرز كل تركيبة مكونات نباتية مختارة بدقة وقواماً أنيقاً وهوية بصرية تحول الحمام إلى مساحة عناية حقيقية.',
        ),
        'Notre vision est claire: proposer une cosmétique française haut de gamme, respectueuse de la peau, attentive aux emballages et fidèle à une beauté plus consciente.' => array(
            'en' => 'Our vision is clear: to offer premium French cosmetics that respect the skin, pay attention to packaging and remain faithful to more conscious beauty.',
            'es' => 'Nuestra visión es clara: ofrecer cosmética francesa de alta gama, respetuosa con la piel, atenta a los envases y fiel a una belleza más consciente.',
            'ar' => 'رؤيتنا واضحة: تقديم مستحضرات تجميل فرنسية فاخرة تحترم البشرة وتهتم بالعبوات وتلتزم بجمال أكثر وعياً.',
        ),
        'Découvrir nos produits' => array(
            'en' => 'Discover our products',
            'es' => 'Descubrir nuestros productos',
            'ar' => 'اكتشف منتجاتنا',
        ),
        'Notre philosophie' => array(
            'en' => 'Our philosophy',
            'es' => 'Nuestra filosofía',
            'ar' => 'فلسفتنا',
        ),
        'Des choix simples, exigeants et durables.' => array(
            'en' => 'Simple, refined and lasting choices.',
            'es' => 'Elecciones simples, exigentes y duraderas.',
            'ar' => 'اختيارات بسيطة ومتقنة ومستدامة.',
        ),
        'Nature' => array(
            'en' => 'Nature',
            'es' => 'Naturaleza',
            'ar' => 'الطبيعة',
        ),
        'Des ingrédients soigneusement sélectionnés pour respecter la peau et révéler son équilibre naturel.' => array(
            'en' => 'Carefully selected ingredients that respect the skin and reveal its natural balance.',
            'es' => 'Ingredientes cuidadosamente seleccionados para respetar la piel y revelar su equilibrio natural.',
            'ar' => 'مكونات مختارة بعناية تحترم البشرة وتبرز توازنها الطبيعي.',
        ),
        'Responsabilité' => array(
            'en' => 'Responsibility',
            'es' => 'Responsabilidad',
            'ar' => 'المسؤولية',
        ),
        'Des emballages pensés pour durer, être recyclés et réduire l’impact de chaque routine.' => array(
            'en' => 'Packaging designed to last, be recycled and reduce the impact of every routine.',
            'es' => 'Envases pensados para durar, reciclarse y reducir el impacto de cada rutina.',
            'ar' => 'عبوات مصممة لتدوم وتُعاد تدويرها وتقلل أثر كل روتين.',
        ),
        'Qualité' => array(
            'en' => 'Quality',
            'es' => 'Calidad',
            'ar' => 'الجودة',
        ),
        'Des formules efficaces, sensorielles et lisibles, développées avec exigence.' => array(
            'en' => 'Effective, sensorial and clear formulas developed with high standards.',
            'es' => 'Fórmulas eficaces, sensoriales y comprensibles, desarrolladas con exigencia.',
            'ar' => 'تركيبات فعالة وحسية وواضحة طُورت بمعايير عالية.',
        ),
        'Engagement' => array(
            'en' => 'Commitment',
            'es' => 'Compromiso',
            'ar' => 'الالتزام',
        ),
        'Une cosmétique respectueuse de la peau, des clientes et des choix de consommation responsables.' => array(
            'en' => 'Cosmetics that respect the skin, customers and responsible consumption choices.',
            'es' => 'Una cosmética respetuosa con la piel, las clientas y las decisiones de consumo responsables.',
            'ar' => 'مستحضرات تحترم البشرة والعملاء وخيارات الاستهلاك المسؤولة.',
        ),
        'd’ingrédients naturels' => array(
            'en' => 'natural ingredients',
            'es' => 'ingredientes naturales',
            'ar' => 'مكونات طبيعية',
        ),
        'villes couvertes' => array(
            'en' => 'cities covered',
            'es' => 'ciudades cubiertas',
            'ar' => 'مدينة مغطاة',
        ),
        'clients satisfaits' => array(
            'en' => 'satisfied customers',
            'es' => 'clientes satisfechos',
            'ar' => 'عميل راض',
        ),
        'Notre processus' => array(
            'en' => 'Our process',
            'es' => 'Nuestro proceso',
            'ar' => 'عمليتنا',
        ),
        'De l’actif botanique au rituel final.' => array(
            'en' => 'From botanical active to final ritual.',
            'es' => 'Del activo botánico al ritual final.',
            'ar' => 'من المكون النباتي إلى الطقس النهائي.',
        ),
        'Sélection des ingrédients' => array(
            'en' => 'Ingredient selection',
            'es' => 'Selección de ingredientes',
            'ar' => 'اختيار المكونات',
        ),
        'Développement des formules' => array(
            'en' => 'Formula development',
            'es' => 'Desarrollo de fórmulas',
            'ar' => 'تطوير التركيبات',
        ),
        'Fabrication française' => array(
            'en' => 'French manufacturing',
            'es' => 'Fabricación francesa',
            'ar' => 'تصنيع فرنسي',
        ),
        'Contrôle qualité' => array(
            'en' => 'Quality control',
            'es' => 'Control de calidad',
            'ar' => 'مراقبة الجودة',
        ),
        'Livraison' => array(
            'en' => 'Delivery',
            'es' => 'Entrega',
            'ar' => 'التوصيل',
        ),
        'Une galerie botanique au service de la peau.' => array(
            'en' => 'A botanical gallery serving the skin.',
            'es' => 'Una galería botánica al servicio de la piel.',
            'ar' => 'معرض نباتي لخدمة البشرة.',
        ),
        'Hydrate et illumine.' => array(
            'en' => 'Hydrates and illuminates.',
            'es' => 'Hidrata e ilumina.',
            'ar' => 'يرطب ويضيء.',
        ),
        'Purifie et équilibre.' => array(
            'en' => 'Purifies and balances.',
            'es' => 'Purifica y equilibra.',
            'ar' => 'ينقي ويوازن.',
        ),
        'Apaise les peaux sensibles.' => array(
            'en' => 'Soothes sensitive skin.',
            'es' => 'Calma las pieles sensibles.',
            'ar' => 'يهدئ البشرة الحساسة.',
        ),
        'Nourrit intensément.' => array(
            'en' => 'Deeply nourishes.',
            'es' => 'Nutre intensamente.',
            'ar' => 'يغذي بعمق.',
        ),
        'Relaxante et sensorielle.' => array(
            'en' => 'Relaxing and sensorial.',
            'es' => 'Relajante y sensorial.',
            'ar' => 'مهدئ وحسي.',
        ),
        'Adoucit et protège.' => array(
            'en' => 'Softens and protects.',
            'es' => 'Suaviza y protege.',
            'ar' => 'ينعم ويحمي.',
        ),
        'Un luxe plus responsable, jusque dans les détails.' => array(
            'en' => 'A more responsible luxury, down to the details.',
            'es' => 'Un lujo más responsable, hasta en los detalles.',
            'ar' => 'فخامة أكثر مسؤولية حتى في التفاصيل.',
        ),
        'Notre démarche associe performance, plaisir d’utilisation et responsabilité. Chaque choix de formulation, d’emballage et de fournisseur vise à créer une beauté plus transparente.' => array(
            'en' => 'Our approach combines performance, pleasure of use and responsibility. Every formula, packaging and supplier choice aims to create more transparent beauty.',
            'es' => 'Nuestro enfoque combina rendimiento, placer de uso y responsabilidad. Cada elección de fórmula, envase y proveedor busca crear una belleza más transparente.',
            'ar' => 'يجمع نهجنا بين الأداء ومتعة الاستخدام والمسؤولية. يهدف كل اختيار في التركيبة والعبوة والمورد إلى خلق جمال أكثر شفافية.',
        ),
        'emballages recyclables' => array(
            'en' => 'recyclable packaging',
            'es' => 'envases reciclables',
            'ar' => 'عبوات قابلة لإعادة التدوير',
        ),
        'ingrédients naturels' => array(
            'en' => 'natural ingredients',
            'es' => 'ingredientes naturales',
            'ar' => 'مكونات طبيعية',
        ),
        'fabrication responsable' => array(
            'en' => 'responsible manufacturing',
            'es' => 'fabricación responsable',
            'ar' => 'تصنيع مسؤول',
        ),
        'fournisseurs européens' => array(
            'en' => 'European suppliers',
            'es' => 'proveedores europeos',
            'ar' => 'موردون أوروبيون',
        ),
        '98 % d’ingrédients d’origine naturelle' => array(
            'en' => '98% naturally derived ingredients',
            'es' => '98 % de ingredientes de origen natural',
            'ar' => '98% مكونات من أصل طبيعي',
        ),
        'Témoignages' => array(
            'en' => 'Testimonials',
            'es' => 'Testimonios',
            'ar' => 'شهادات العملاء',
        ),
        'Une expérience qui reste en mémoire.' => array(
            'en' => 'An experience that stays with you.',
            'es' => 'Una experiencia que queda en la memoria.',
            'ar' => 'تجربة تبقى في الذاكرة.',
        ),
        'La marque raconte exactement ce que je cherchais: des soins naturels, beaux, efficaces et vraiment agréables à utiliser.' => array(
            'en' => 'The brand expresses exactly what I was looking for: natural, beautiful, effective products that are truly enjoyable to use.',
            'es' => 'La marca expresa exactamente lo que buscaba: cuidados naturales, bonitos, eficaces y muy agradables de usar.',
            'ar' => 'تعبر العلامة تماماً عما كنت أبحث عنه: عناية طبيعية وجميلة وفعالة وممتعة حقاً في الاستخدام.',
        ),
        'J’aime la cohérence de l’univers, la texture des produits et la sensation premium sans excès. Tout paraît très soigné.' => array(
            'en' => 'I love the consistency of the universe, the product textures and the premium feeling without excess. Everything feels carefully considered.',
            'es' => 'Me encanta la coherencia del universo, la textura de los productos y la sensación premium sin exceso. Todo parece muy cuidado.',
            'ar' => 'أحب اتساق الهوية وقوام المنتجات والإحساس الفاخر دون مبالغة. كل شيء يبدو مدروساً بعناية.',
        ),
        'Les routines sont simples à comprendre et les packagings sont magnifiques dans la salle de bain. C’est naturel et élégant.' => array(
            'en' => 'The routines are easy to understand and the packaging looks beautiful in the bathroom. It feels natural and elegant.',
            'es' => 'Las rutinas son fáciles de entender y los envases quedan preciosos en el baño. Es natural y elegante.',
            'ar' => 'الروتينات سهلة الفهم والعبوات جميلة في الحمام. إنها طبيعية وأنيقة.',
        ),
        'Cosmétique naturelle premium' => array(
            'en' => 'Premium natural cosmetics',
            'es' => 'Cosmética natural premium',
            'ar' => 'مستحضرات تجميل طبيعية فاخرة',
        ),
        'Prenez soin de votre peau naturellement.' => array(
            'en' => 'Care for your skin naturally.',
            'es' => 'Cuida tu piel naturalmente.',
            'ar' => 'اعتن ببشرتك طبيعياً.',
        ),
        'Découvrez des soins pensés pour accompagner vos routines avec exigence, douceur et élégance.' => array(
            'en' => 'Discover care products designed to support your routines with refinement, softness and elegance.',
            'es' => 'Descubre cuidados pensados para acompañar tus rutinas con exigencia, suavidad y elegancia.',
            'ar' => 'اكتشف منتجات عناية صممت لمرافقة روتينك بدقة ولطف وأناقة.',
        ),
        'Nous contacter' => array(
            'en' => 'Contact us',
            'es' => 'Contactarnos',
            'ar' => 'تواصل معنا',
        ),
        'Nos univers' => array(
            'en' => 'Our worlds',
            'es' => 'Nuestros universos',
            'ar' => 'عوالمنا',
        ),
        'Explorez les rituels Cosm’Éthique' => array(
            'en' => 'Explore Cosm’Éthique rituals',
            'es' => 'Explora los rituales Cosm’Éthique',
            'ar' => 'استكشف طقوس كوزم إيثيك',
        ),
        'Des soins naturels, sensoriels et précis, organisés par besoins pour composer une routine élégante et efficace.' => array(
            'en' => 'Natural, sensorial and precise care, organised by need to create an elegant and effective routine.',
            'es' => 'Cuidados naturales, sensoriales y precisos, organizados por necesidades para crear una rutina elegante y eficaz.',
            'ar' => 'عناية طبيعية وحسية ودقيقة، منظمة حسب الاحتياجات لتكوين روتين أنيق وفعال.',
        ),
        'La sélection complète Cosm’Éthique pour le visage, le corps et les cheveux.' => array(
            'en' => 'The full Cosm’Éthique selection for face, body and hair.',
            'es' => 'La selección completa Cosm’Éthique para rostro, cuerpo y cabello.',
            'ar' => 'تشكيلة كوزم إيثيك الكاملة للوجه والجسم والشعر.',
        ),
        'Voir les soins visage' => array(
            'en' => 'View face care',
            'es' => 'Ver cuidado facial',
            'ar' => 'عرض عناية الوجه',
        ),
        'Voir les soins corps' => array(
            'en' => 'View body care',
            'es' => 'Ver cuidado corporal',
            'ar' => 'عرض عناية الجسم',
        ),
        'Voir les soins cheveux' => array(
            'en' => 'View hair care',
            'es' => 'Ver cuidado capilar',
            'ar' => 'عرض عناية الشعر',
        ),
        'Sérum rose, crème sauge & camomille et masque argile verte pour révéler l’éclat.' => array(
            'en' => 'Rose serum, sage & chamomile cream and green clay mask to reveal radiance.',
            'es' => 'Sérum de rosa, crema salvia y manzanilla y mascarilla de arcilla verde para revelar la luminosidad.',
            'ar' => 'سيروم الورد وكريم المريمية والبابونج وماسك الطين الأخضر لإبراز الإشراقة.',
        ),
        'Baume karité, huile botanique et lavande fine pour nourrir et sublimer la peau.' => array(
            'en' => 'Shea balm, botanical oil and fine lavender to nourish and enhance the skin.',
            'es' => 'Bálsamo de karité, aceite botánico y lavanda fina para nutrir y sublimar la piel.',
            'ar' => 'بلسم الشيا والزيت النباتي واللافندر الناعم لتغذية البشرة وإبراز جمالها.',
        ),
        'Shampooing sauge & ortie et masque réparateur pour une fibre douce et lumineuse.' => array(
            'en' => 'Sage & nettle shampoo and repairing mask for soft, luminous hair.',
            'es' => 'Champú salvia y ortiga y mascarilla reparadora para una fibra suave y luminosa.',
            'ar' => 'شامبو المريمية والقراص وماسك الإصلاح لشعر ناعم ومشرق.',
        ),
        'Notre savoir-faire' => array(
            'en' => 'Our expertise',
            'es' => 'Nuestro saber hacer',
            'ar' => 'خبرتنا',
        ),
        'Chaque soin Cosm\'Éthique est pensé pour offrir une expérience sensorielle tout en respectant la peau et la nature.' => array(
            'en' => 'Every Cosm’Éthique product is designed to offer a sensorial experience while respecting the skin and nature.',
            'es' => 'Cada cuidado Cosm’Éthique está pensado para ofrecer una experiencia sensorial respetando la piel y la naturaleza.',
            'ar' => 'صُمم كل منتج من كوزم إيثيك ليقدم تجربة حسية مع احترام البشرة والطبيعة.',
        ),
        'NOTRE EXPERTISE' => array(
            'en' => 'OUR EXPERTISE',
            'es' => 'NUESTRA EXPERTISE',
            'ar' => 'خبرتنا',
        ),
        'Des soins conçus avec précision.' => array(
            'en' => 'Care designed with precision.',
            'es' => 'Cuidados diseñados con precisión.',
            'ar' => 'عناية مصممة بدقة.',
        ),
        'Chez Cosm\'Éthique, chaque formule est développée autour d\'actifs soigneusement sélectionnés.' => array(
            'en' => 'At Cosm’Éthique, every formula is developed around carefully selected active ingredients.',
            'es' => 'En Cosm’Éthique, cada fórmula se desarrolla alrededor de activos cuidadosamente seleccionados.',
            'ar' => 'في كوزم إيثيك، تُطوّر كل تركيبة حول مكونات فعالة مختارة بعناية.',
        ),
        'Nous privilégions les ingrédients naturels, les textures élégantes et une fabrication responsable afin d\'offrir une efficacité visible sans compromettre le respect de la peau.' => array(
            'en' => 'We prioritise natural ingredients, elegant textures and responsible manufacturing to deliver visible effectiveness without compromising skin respect.',
            'es' => 'Priorizamos ingredientes naturales, texturas elegantes y una fabricación responsable para ofrecer una eficacia visible sin comprometer el respeto de la piel.',
            'ar' => 'نفضل المكونات الطبيعية والقوام الأنيق والتصنيع المسؤول لتقديم فعالية واضحة دون المساس باحترام البشرة.',
        ),
        'Engagements de formulation Cosm’Éthique' => array(
            'en' => 'Cosm’Éthique formulation commitments',
            'es' => 'Compromisos de formulación Cosm’Éthique',
            'ar' => 'التزامات تركيبة كوزم إيثيك',
        ),
        '98 % d\'ingrédients naturels' => array(
            'en' => '98% natural ingredients',
            'es' => '98 % de ingredientes naturales',
            'ar' => '98% مكونات طبيعية',
        ),
        'Actifs soigneusement sélectionnés' => array(
            'en' => 'Carefully selected active ingredients',
            'es' => 'Activos cuidadosamente seleccionados',
            'ar' => 'مكونات فعالة مختارة بعناية',
        ),
        'Packaging recyclable' => array(
            'en' => 'Recyclable packaging',
            'es' => 'Packaging reciclable',
            'ar' => 'عبوات قابلة لإعادة التدوير',
        ),
        'Cruelty Free' => array(
            'en' => 'Cruelty Free',
            'es' => 'Cruelty Free',
            'ar' => 'خال من التجارب على الحيوانات',
        ),
        'Produits Cosm’Éthique sur pierre naturelle avec fleurs séchées' => array(
            'en' => 'Cosm’Éthique products on natural stone with dried flowers',
            'es' => 'Productos Cosm’Éthique sobre piedra natural con flores secas',
            'ar' => 'منتجات كوزم إيثيك على حجر طبيعي مع زهور مجففة',
        ),
        'Un commentaire' => array( 'en' => 'One comment', 'es' => 'Un comentario', 'ar' => 'تعليق واحد' ),
        '%d commentaires' => array( 'en' => '%d comments', 'es' => '%d comentarios', 'ar' => '%d تعليقات' ),
        'Navigation dans les commentaires' => array( 'en' => 'Comment navigation', 'es' => 'Navegación de comentarios', 'ar' => 'التنقل بين التعليقات' ),
        '← Commentaires précédents' => array( 'en' => '← Previous comments', 'es' => '← Comentarios anteriores', 'ar' => '→ التعليقات السابقة' ),
        'Commentaires suivants →' => array( 'en' => 'Next comments →', 'es' => 'Comentarios siguientes →', 'ar' => 'التعليقات التالية ←' ),
        'Envoyer le commentaire' => array( 'en' => 'Submit comment', 'es' => 'Enviar comentario', 'ar' => 'إرسال التعليق' ),
        'Laisser un commentaire' => array( 'en' => 'Leave a comment', 'es' => 'Dejar un comentario', 'ar' => 'اترك تعليقاً' ),
        'Les commentaires sont fermés pour cet article.' => array( 'en' => 'Comments are closed for this article.', 'es' => 'Los comentarios están cerrados para este artículo.', 'ar' => 'التعليقات مغلقة لهذا المقال.' ),
        'Gérer mes cookies' => array( 'en' => 'Manage my cookies', 'es' => 'Gestionar mis cookies', 'ar' => 'إدارة ملفات تعريف الارتباط' ),
        'Votre confidentialité' => array( 'en' => 'Your privacy', 'es' => 'Tu privacidad', 'ar' => 'خصوصيتك' ),
        'Nous utilisons des cookies afin d’améliorer votre expérience de navigation, mesurer l’audience du site et personnaliser certains contenus. Vous pouvez accepter tous les cookies, les refuser ou personnaliser vos préférences.' => array( 'en' => 'We use cookies to improve your browsing experience, measure site traffic and personalise certain content. You can accept all cookies, refuse them or customise your preferences.', 'es' => 'Utilizamos cookies para mejorar tu experiencia de navegación, medir la audiencia del sitio y personalizar ciertos contenidos. Puedes aceptar todas las cookies, rechazarlas o personalizar tus preferencias.', 'ar' => 'نستخدم ملفات تعريف الارتباط لتحسين تجربة التصفح وقياس جمهور الموقع وتخصيص بعض المحتويات. يمكنك قبول كل الملفات أو رفضها أو تخصيص تفضيلاتك.' ),
        'Consulter la politique de cookies' => array( 'en' => 'View the cookie policy', 'es' => 'Consultar la política de cookies', 'ar' => 'عرض سياسة ملفات تعريف الارتباط' ),
        'Fermer les préférences cookies' => array( 'en' => 'Close cookie preferences', 'es' => 'Cerrar preferencias de cookies', 'ar' => 'إغلاق تفضيلات ملفات تعريف الارتباط' ),
        'Préférences RGPD' => array( 'en' => 'GDPR preferences', 'es' => 'Preferencias RGPD', 'ar' => 'تفضيلات حماية البيانات' ),
        'Choisissez les catégories que vous acceptez. Les cookies strictement nécessaires restent actifs pour assurer le fonctionnement du site.' => array( 'en' => 'Choose the categories you accept. Strictly necessary cookies remain active to keep the site working.', 'es' => 'Elige las categorías que aceptas. Las cookies estrictamente necesarias permanecen activas para garantizar el funcionamiento del sitio.', 'ar' => 'اختر الفئات التي توافق عليها. تبقى ملفات تعريف الارتباط الضرورية مفعلة لضمان عمل الموقع.' ),
        'Cookies strictement nécessaires' => array( 'en' => 'Strictly necessary cookies', 'es' => 'Cookies estrictamente necesarias', 'ar' => 'ملفات تعريف ارتباط ضرورية' ),
        'Indispensables au panier, à la sécurité, au paiement et à la mémorisation de vos choix.' => array( 'en' => 'Essential for the cart, security, payment and remembering your choices.', 'es' => 'Indispensables para el carrito, la seguridad, el pago y recordar tus elecciones.', 'ar' => 'ضرورية للسلة والأمان والدفع وتذكر اختياراتك.' ),
        'Toujours activés' => array( 'en' => 'Always enabled', 'es' => 'Siempre activadas', 'ar' => 'مفعلة دائماً' ),
        'Cookies analytiques' => array( 'en' => 'Analytics cookies', 'es' => 'Cookies analíticas', 'ar' => 'ملفات تحليلية' ),
        'Ils nous aident à comprendre la navigation afin d’améliorer les contenus et les parcours.' => array( 'en' => 'They help us understand browsing so we can improve content and journeys.', 'es' => 'Nos ayudan a comprender la navegación para mejorar contenidos y recorridos.', 'ar' => 'تساعدنا على فهم التصفح لتحسين المحتوى والمسارات.' ),
        'Activer les cookies analytiques' => array( 'en' => 'Enable analytics cookies', 'es' => 'Activar cookies analíticas', 'ar' => 'تفعيل الملفات التحليلية' ),
        'Cookies marketing' => array( 'en' => 'Marketing cookies', 'es' => 'Cookies de marketing', 'ar' => 'ملفات تسويقية' ),
        'Ils permettent de mesurer les campagnes et de proposer des contenus publicitaires plus pertinents.' => array( 'en' => 'They measure campaigns and help provide more relevant advertising content.', 'es' => 'Permiten medir campañas y proponer contenidos publicitarios más pertinentes.', 'ar' => 'تسمح بقياس الحملات وتقديم محتوى إعلاني أكثر ملاءمة.' ),
        'Activer les cookies marketing' => array( 'en' => 'Enable marketing cookies', 'es' => 'Activar cookies de marketing', 'ar' => 'تفعيل الملفات التسويقية' ),
        'Cookies de personnalisation' => array( 'en' => 'Personalisation cookies', 'es' => 'Cookies de personalización', 'ar' => 'ملفات التخصيص' ),
        'Ils mémorisent vos préférences afin de rendre l’expérience plus fluide et adaptée.' => array( 'en' => 'They remember your preferences to make the experience smoother and more tailored.', 'es' => 'Memorizan tus preferencias para que la experiencia sea más fluida y adaptada.', 'ar' => 'تتذكر تفضيلاتك لجعل التجربة أكثر سلاسة وملاءمة.' ),
        'Activer les cookies de personnalisation' => array( 'en' => 'Enable personalisation cookies', 'es' => 'Activar cookies de personalización', 'ar' => 'تفعيل ملفات التخصيص' ),
        'Enregistrer mes choix' => array( 'en' => 'Save my choices', 'es' => 'Guardar mis elecciones', 'ar' => 'حفظ اختياراتي' ),
        'Ajouter %s au panier' => array( 'en' => 'Add %s to cart', 'es' => 'Añadir %s al carrito', 'ar' => 'أضف %s إلى السلة' ),
        'Instagram' => array( 'en' => 'Instagram', 'es' => 'Instagram', 'ar' => 'Instagram' ),
        'Pinterest' => array( 'en' => 'Pinterest', 'es' => 'Pinterest', 'ar' => 'Pinterest' ),
        'TikTok' => array( 'en' => 'TikTok', 'es' => 'TikTok', 'ar' => 'TikTok' ),
        'Votre routine beauté a été ajoutée au panier.' => array( 'en' => 'Your beauty routine has been added to the cart.', 'es' => 'Tu rutina de belleza se ha añadido al carrito.', 'ar' => 'تمت إضافة روتين الجمال إلى السلة.' ),
        'Ajoutez un produit au panier avant d’appliquer votre code promo.' => array( 'en' => 'Add a product to the cart before applying your promo code.', 'es' => 'Añade un producto al carrito antes de aplicar tu código promocional.', 'ar' => 'أضف منتجاً إلى السلة قبل تطبيق كود الخصم.' ),
        'Ce code promo est déjà appliqué à votre panier.' => array( 'en' => 'This promo code is already applied to your cart.', 'es' => 'Este código promocional ya está aplicado a tu carrito.', 'ar' => 'تم تطبيق كود الخصم هذا على سلتك بالفعل.' ),
        'Code promo appliqué avec succès.' => array( 'en' => 'Promo code applied successfully.', 'es' => 'Código promocional aplicado correctamente.', 'ar' => 'تم تطبيق كود الخصم بنجاح.' ),
        'Ce code promo n’est pas valide pour le moment.' => array( 'en' => 'This promo code is not valid at the moment.', 'es' => 'Este código promocional no es válido por el momento.', 'ar' => 'كود الخصم هذا غير صالح حالياً.' ),
        'Galerie produit' => array( 'en' => 'Product gallery', 'es' => 'Galería de producto', 'ar' => 'معرض المنتج' ),
        'Agrandir l’image produit' => array( 'en' => 'Enlarge product image', 'es' => 'Ampliar imagen de producto', 'ar' => 'تكبير صورة المنتج' ),
        'Miniatures produit' => array( 'en' => 'Product thumbnails', 'es' => 'Miniaturas de producto', 'ar' => 'مصغرات المنتج' ),
        '%s - face avant' => array( 'en' => '%s - front view', 'es' => '%s - vista frontal', 'ar' => '%s - الواجهة الأمامية' ),
        '%s - vue %d' => array( 'en' => '%s - view %d', 'es' => '%s - vista %d', 'ar' => '%s - منظر %d' ),
        'Appliquer' => array( 'en' => 'Apply', 'es' => 'Aplicar', 'ar' => 'تطبيق' ),
        'Astuce: utilisez COSM20 pour tester une remise de bienvenue.' => array( 'en' => 'Tip: use COSM20 to test a welcome discount.', 'es' => 'Consejo: utiliza COSM20 para probar un descuento de bienvenida.', 'ar' => 'نصيحة: استخدم COSM20 لتجربة خصم الترحيب.' ),
        'Partager ce produit' => array( 'en' => 'Share this product', 'es' => 'Compartir este producto', 'ar' => 'شارك هذا المنتج' ),
        'Avis clientes' => array( 'en' => 'Customer reviews', 'es' => 'Opiniones de clientas', 'ar' => 'آراء العميلات' ),
        'Voir l’offre' => array( 'en' => 'View offer', 'es' => 'Ver oferta', 'ar' => 'عرض العرض' ),
        'Filtrer les articles' => array( 'en' => 'Filter articles', 'es' => 'Filtrar artículos', 'ar' => 'تصفية المقالات' ),
        'Tous' => array( 'en' => 'All', 'es' => 'Todos', 'ar' => 'الكل' ),
        'Visage' => array( 'en' => 'Face', 'es' => 'Rostro', 'ar' => 'الوجه' ),
        'Corps' => array( 'en' => 'Body', 'es' => 'Cuerpo', 'ar' => 'الجسم' ),
        'Cheveux' => array( 'en' => 'Hair', 'es' => 'Cabello', 'ar' => 'الشعر' ),
        'Bien-être' => array( 'en' => 'Well-being', 'es' => 'Bienestar', 'ar' => 'الرفاهية' ),
        'Peau sensible' => array( 'en' => 'Sensitive skin', 'es' => 'Piel sensible', 'ar' => 'البشرة الحساسة' ),
        'Trier par' => array( 'en' => 'Sort by', 'es' => 'Ordenar por', 'ar' => 'ترتيب حسب' ),
        'Les plus récents' => array( 'en' => 'Most recent', 'es' => 'Más recientes', 'ar' => 'الأحدث' ),
        'Compléments blog' => array( 'en' => 'Blog extras', 'es' => 'Complementos del blog', 'ar' => 'إضافات المدونة' ),
        'Articles populaires' => array( 'en' => 'Popular articles', 'es' => 'Artículos populares', 'ar' => 'مقالات شائعة' ),
        'Recevez nos conseils beauté chaque semaine' => array( 'en' => 'Receive our beauty tips every week', 'es' => 'Recibe nuestros consejos de belleza cada semana', 'ar' => 'احصل على نصائح الجمال كل أسبوع' ),
        'Conseils rédigés avec une experte' => array( 'en' => 'Advice written with an expert', 'es' => 'Consejos redactados con una experta', 'ar' => 'نصائح مكتوبة مع خبيرة' ),
        'Sans compromis' => array( 'en' => 'No compromise', 'es' => 'Sin compromisos', 'ar' => 'دون تنازلات' ),
        'Engagement éthique' => array( 'en' => 'Ethical commitment', 'es' => 'Compromiso ético', 'ar' => 'التزام أخلاقي' ),
        'Conseils beauté' => array( 'en' => 'Beauty advice', 'es' => 'Consejos de belleza', 'ar' => 'نصائح الجمال' ),
        'Fil d’Ariane' => array( 'en' => 'Breadcrumb', 'es' => 'Miga de pan', 'ar' => 'مسار التنقل' ),
        'Partager' => array( 'en' => 'Share', 'es' => 'Compartir', 'ar' => 'مشاركة' ),
        'Sommaire' => array( 'en' => 'Summary', 'es' => 'Sumario', 'ar' => 'الفهرس' ),
        'Comprendre le besoin de peau' => array( 'en' => 'Understand skin needs', 'es' => 'Comprender las necesidades de la piel', 'ar' => 'فهم احتياجات البشرة' ),
        'Choisir les bons actifs' => array( 'en' => 'Choose the right active ingredients', 'es' => 'Elegir los activos adecuados', 'ar' => 'اختيار المكونات الفعالة المناسبة' ),
        'Construire une routine douce' => array( 'en' => 'Build a gentle routine', 'es' => 'Construir una rutina suave', 'ar' => 'بناء روتين لطيف' ),
        'Conseils d’application' => array( 'en' => 'Application tips', 'es' => 'Consejos de aplicación', 'ar' => 'نصائح التطبيق' ),
        'Ingrédients vedettes' => array( 'en' => 'Featured ingredients', 'es' => 'Ingredientes destacados', 'ar' => 'المكونات البارزة' ),
        'Masque cheveux réparateur' => array( 'en' => 'Repairing hair mask', 'es' => 'Mascarilla capilar reparadora', 'ar' => 'ماسك إصلاح الشعر' ),
        'Les secrets de la lavande fine' => array( 'en' => 'The secrets of fine lavender', 'es' => 'Los secretos de la lavanda fina', 'ar' => 'أسرار اللافندر الناعم' ),
        'Commande simplifiée' => array( 'en' => 'Simplified ordering', 'es' => 'Pedido simplificado', 'ar' => 'طلب مبسط' ),
        'Suivez vos commandes en temps réel.' => array( 'en' => 'Track your orders in real time.', 'es' => 'Sigue tus pedidos en tiempo real.', 'ar' => 'تتبع طلباتك في الوقت الفعلي.' ),
        'Diagnostic personnalisé' => array( 'en' => 'Personalised diagnostic', 'es' => 'Diagnóstico personalizado', 'ar' => 'تشخيص شخصي' ),
        'Retrouvez vos recommandations beauté.' => array( 'en' => 'Find your beauty recommendations.', 'es' => 'Encuentra tus recomendaciones de belleza.', 'ar' => 'اعثر على توصيات الجمال الخاصة بك.' ),
        'Favoris' => array( 'en' => 'Favourites', 'es' => 'Favoritos', 'ar' => 'المفضلة' ),
        'Enregistrez vos produits préférés.' => array( 'en' => 'Save your favourite products.', 'es' => 'Guarda tus productos favoritos.', 'ar' => 'احفظ منتجاتك المفضلة.' ),
        'Offres exclusives' => array( 'en' => 'Exclusive offers', 'es' => 'Ofertas exclusivas', 'ar' => 'عروض حصرية' ),
        'Accédez à des avantages réservés aux membres.' => array( 'en' => 'Access member-only benefits.', 'es' => 'Accede a ventajas reservadas a miembros.', 'ar' => 'استفد من مزايا حصرية للأعضاء.' ),
        'Mon espace beauté' => array( 'en' => 'My beauty space', 'es' => 'Mi espacio belleza', 'ar' => 'مساحة الجمال الخاصة بي' ),
        'Retrouvez vos commandes, votre diagnostic personnalisé, vos favoris et profitez d’une expérience pensée pour vous.' => array( 'en' => 'Find your orders, personalised diagnostic, favourites and enjoy an experience designed for you.', 'es' => 'Encuentra tus pedidos, diagnóstico personalizado, favoritos y disfruta de una experiencia pensada para ti.', 'ar' => 'اعثر على طلباتك وتشخيصك الشخصي ومفضلاتك واستمتع بتجربة مصممة لك.' ),
        'Créer un compte' => array( 'en' => 'Create an account', 'es' => 'Crear una cuenta', 'ar' => 'إنشاء حساب' ),
        'Se connecter' => array( 'en' => 'Sign in', 'es' => 'Iniciar sesión', 'ar' => 'تسجيل الدخول' ),
        'Produits COSM’ÉTHIQUE' => array( 'en' => 'COSM’ÉTHIQUE products', 'es' => 'Productos COSM’ÉTHIQUE', 'ar' => 'منتجات كوزم إيثيك' ),
        'Espace sécurisé' => array( 'en' => 'Secure space', 'es' => 'Espacio seguro', 'ar' => 'مساحة آمنة' ),
        'Commandes, favoris et routine beauté' => array( 'en' => 'Orders, favourites and beauty routine', 'es' => 'Pedidos, favoritos y rutina de belleza', 'ar' => 'الطلبات والمفضلة وروتين الجمال' ),
        'Connexion à l’espace client' => array( 'en' => 'Customer area login', 'es' => 'Conexión al espacio cliente', 'ar' => 'تسجيل دخول مساحة العميل' ),
        'Bienvenue' => array( 'en' => 'Welcome', 'es' => 'Bienvenida', 'ar' => 'مرحباً' ),
        'Connectez-vous à votre espace personnel.' => array( 'en' => 'Sign in to your personal space.', 'es' => 'Conéctate a tu espacio personal.', 'ar' => 'سجل الدخول إلى مساحتك الشخصية.' ),
        'Espace membre' => array( 'en' => 'Member area', 'es' => 'Espacio miembro', 'ar' => 'مساحة العضو' ),
        'Pourquoi créer un compte ?' => array( 'en' => 'Why create an account?', 'es' => '¿Por qué crear una cuenta?', 'ar' => 'لماذا تنشئ حساباً؟' ),
        'Chiffres clés COSM’ÉTHIQUE' => array( 'en' => 'COSM’ÉTHIQUE key figures', 'es' => 'Cifras clave COSM’ÉTHIQUE', 'ar' => 'أرقام كوزم إيثيك الرئيسية' ),
        'clientes satisfaites' => array( 'en' => 'satisfied customers', 'es' => 'clientas satisfechas', 'ar' => 'عميلات راضيات' ),
        'd’ingrédients d’origine naturelle' => array( 'en' => 'naturally derived ingredients', 'es' => 'ingredientes de origen natural', 'ar' => 'مكونات من أصل طبيعي' ),
        'livraison en 24/72 h' => array( 'en' => 'delivery in 24/72h', 'es' => 'entrega en 24/72 h', 'ar' => 'توصيل خلال 24/72 ساعة' ),
        'paiement sécurisé' => array( 'en' => 'secure payment', 'es' => 'pago seguro', 'ar' => 'دفع آمن' ),
        'Confidentialité' => array( 'en' => 'Privacy', 'es' => 'Confidencialidad', 'ar' => 'الخصوصية' ),
        'Une gestion claire et maîtrisée des cookies.' => array( 'en' => 'Clear and controlled cookie management.', 'es' => 'Una gestión clara y controlada de las cookies.', 'ar' => 'إدارة واضحة ومحكمة لملفات تعريف الارتباط.' ),
        'Détail des finalités' => array( 'en' => 'Purpose details', 'es' => 'Detalle de finalidades', 'ar' => 'تفاصيل الأغراض' ),
        'Catégorie' => array( 'en' => 'Category', 'es' => 'Categoría', 'ar' => 'الفئة' ),
        'Finalité' => array( 'en' => 'Purpose', 'es' => 'Finalidad', 'ar' => 'الغرض' ),
        'Consentement' => array( 'en' => 'Consent', 'es' => 'Consentimiento', 'ar' => 'الموافقة' ),
        'Durée' => array( 'en' => 'Duration', 'es' => 'Duración', 'ar' => 'المدة' ),
        'Nécessaires' => array( 'en' => 'Necessary', 'es' => 'Necesarias', 'ar' => 'ضرورية' ),
        'Non requis' => array( 'en' => 'Not required', 'es' => 'No requerido', 'ar' => 'غير مطلوب' ),
        'Analytiques' => array( 'en' => 'Analytics', 'es' => 'Analíticas', 'ar' => 'تحليلية' ),
        'Requis' => array( 'en' => 'Required', 'es' => 'Requerido', 'ar' => 'مطلوب' ),
        'Marketing' => array( 'en' => 'Marketing', 'es' => 'Marketing', 'ar' => 'تسويق' ),
        'Personnalisation' => array( 'en' => 'Personalisation', 'es' => 'Personalización', 'ar' => 'تخصيص' ),
        'Vos droits' => array( 'en' => 'Your rights', 'es' => 'Tus derechos', 'ar' => 'حقوقك' ),
        'Menu principal' => array( 'en' => 'Main menu', 'es' => 'Menú principal', 'ar' => 'القائمة الرئيسية' ),
        'Menu pied de page' => array( 'en' => 'Footer menu', 'es' => 'Menú de pie de página', 'ar' => 'قائمة التذييل' ),
        'Sidebar blog' => array( 'en' => 'Blog sidebar', 'es' => 'Barra lateral del blog', 'ar' => 'الشريط الجانبي للمدونة' ),
        'Widgets affichés sur le blog et les archives.' => array( 'en' => 'Widgets displayed on the blog and archives.', 'es' => 'Widgets mostrados en el blog y los archivos.', 'ar' => 'ودجات تظهر في المدونة والأرشيف.' ),
        'Sécurité COSM’ETHIQUE' => array( 'en' => 'COSM’ÉTHIQUE security', 'es' => 'Seguridad COSM’ÉTHIQUE', 'ar' => 'أمان كوزم إيثيك' ),
        'Ajoutez les clés Google reCAPTCHA v3 pour protéger les formulaires et le checkout.' => array( 'en' => 'Add Google reCAPTCHA v3 keys to protect forms and checkout.', 'es' => 'Añade las claves Google reCAPTCHA v3 para proteger formularios y checkout.', 'ar' => 'أضف مفاتيح Google reCAPTCHA v3 لحماية النماذج والدفع.' ),
        'Clé site reCAPTCHA v3' => array( 'en' => 'reCAPTCHA v3 site key', 'es' => 'Clave de sitio reCAPTCHA v3', 'ar' => 'مفتاح موقع reCAPTCHA v3' ),
        'Clé secrète reCAPTCHA v3' => array( 'en' => 'reCAPTCHA v3 secret key', 'es' => 'Clave secreta reCAPTCHA v3', 'ar' => 'المفتاح السري reCAPTCHA v3' ),
        'Site web' => array( 'en' => 'Website', 'es' => 'Sitio web', 'ar' => 'الموقع الإلكتروني' ),
        'Protection COSM’ETHIQUE: l’anti-spam invisible est actif, mais reCAPTCHA v3 nécessite encore les clés Google pour être totalement activé.' => array( 'en' => 'COSM’ÉTHIQUE protection: invisible anti-spam is active, but reCAPTCHA v3 still needs Google keys to be fully enabled.', 'es' => 'Protección COSM’ÉTHIQUE: el antispam invisible está activo, pero reCAPTCHA v3 aún necesita las claves de Google para activarse por completo.', 'ar' => 'حماية كوزم إيثيك: مكافحة الرسائل المزعجة غير المرئية نشطة، لكن reCAPTCHA v3 يحتاج إلى مفاتيح Google للتفعيل الكامل.' ),
        'Ajouter les clés' => array( 'en' => 'Add keys', 'es' => 'Añadir claves', 'ar' => 'إضافة المفاتيح' ),
        'CGV' => array( 'en' => 'Terms of sale', 'es' => 'CGV', 'ar' => 'شروط البيع' ),
        'CGU' => array( 'en' => 'Terms of use', 'es' => 'CGU', 'ar' => 'شروط الاستخدام' ),
        'Politique confidentialité' => array( 'en' => 'Privacy policy', 'es' => 'Política de privacidad', 'ar' => 'سياسة الخصوصية' ),
        'Politique de cookies' => array( 'en' => 'Cookie policy', 'es' => 'Política de cookies', 'ar' => 'سياسة ملفات تعريف الارتباط' ),
        '21 mai 2026' => array( 'en' => '21 May 2026', 'es' => '21 mayo 2026', 'ar' => '21 مايو 2026' ),
        'COSM’ÉTHIQUE' => array( 'en' => 'COSM’ÉTHIQUE', 'es' => 'COSM’ÉTHIQUE', 'ar' => 'كوزم إيثيك' ),
        'Ex: COSM20' => array( 'en' => 'E.g. COSM20', 'es' => 'Ej.: COSM20', 'ar' => 'مثال: COSM20' ),
        'La texture est vraiment premium. Le produit correspond exactement à la promesse et s’intègre facilement dans ma routine.' => array( 'en' => 'The texture feels truly premium. The product matches the promise exactly and fits easily into my routine.', 'es' => 'La textura es realmente premium. El producto cumple exactamente su promesa y se integra fácilmente en mi rutina.', 'ar' => 'القوام فاخر حقاً. المنتج يطابق الوعد تماماً ويندمج بسهولة في روتيني.' ),
        'J’aime le côté naturel mais élégant. Le parfum est discret, le packaging est beau, et la peau reste confortable.' => array( 'en' => 'I love the natural yet elegant feel. The fragrance is subtle, the packaging is beautiful and the skin stays comfortable.', 'es' => 'Me encanta el lado natural pero elegante. El perfume es discreto, el packaging es bonito y la piel queda cómoda.', 'ar' => 'أحب الطابع الطبيعي والأنيق. الرائحة خفيفة، والتغليف جميل، والبشرة تبقى مرتاحة.' ),
        'Très bonne découverte. La livraison a été rapide et les conseils d’utilisation sur la fiche produit sont clairs.' => array( 'en' => 'A very good discovery. Delivery was fast and the usage tips on the product page are clear.', 'es' => 'Muy buen descubrimiento. La entrega fue rápida y los consejos de uso en la ficha son claros.', 'ar' => 'اكتشاف رائع. كان التوصيل سريعاً وتعليمات الاستخدام في صفحة المنتج واضحة.' ),
        'Introduction boutique Cosm’Éthique' => array( 'en' => 'Cosm’Éthique shop introduction', 'es' => 'Introducción tienda Cosm’Éthique', 'ar' => 'مقدمة متجر كوزم إيثيك' ),
        'Avantages Cosm’Éthique' => array( 'en' => 'Cosm’Éthique benefits', 'es' => 'Ventajas Cosm’Éthique', 'ar' => 'مزايا كوزم إيثيك' ),
        'Pagination du slider' => array( 'en' => 'Slider pagination', 'es' => 'Paginación del slider', 'ar' => 'ترقيم الشريط' ),
        'Compte à rebours promotionnel' => array( 'en' => 'Offer countdown', 'es' => 'Cuenta atrás promocional', 'ar' => 'عد تنازلي للعرض' ),
        'Collection soins du visage Cosm’Éthique' => array( 'en' => 'Cosm’Éthique face care collection', 'es' => 'Colección cuidado facial Cosm’Éthique', 'ar' => 'مجموعة العناية بالوجه كوزم إيثيك' ),
        'Collection soins du corps Cosm’Éthique' => array( 'en' => 'Cosm’Éthique body care collection', 'es' => 'Colección cuidado corporal Cosm’Éthique', 'ar' => 'مجموعة العناية بالجسم كوزم إيثيك' ),
        'Collection soins cheveux Cosm’Éthique' => array( 'en' => 'Cosm’Éthique hair care collection', 'es' => 'Colección cuidado capilar Cosm’Éthique', 'ar' => 'مجموعة العناية بالشعر كوزم إيثيك' ),
        'Accessoires beauté Cosm’Éthique' => array( 'en' => 'Cosm’Éthique beauty accessories', 'es' => 'Accesorios belleza Cosm’Éthique', 'ar' => 'إكسسوارات الجمال كوزم إيثيك' ),
        'Packs beauté Cosm’Éthique' => array( 'en' => 'Cosm’Éthique beauty sets', 'es' => 'Packs belleza Cosm’Éthique', 'ar' => 'مجموعات الجمال كوزم إيثيك' ),
        'Suivi de commande' => array( 'en' => 'Order tracking', 'es' => 'Seguimiento de pedido', 'ar' => 'تتبع الطلب' ),
        'Commande confirmée' => array( 'en' => 'Order confirmed', 'es' => 'Pedido confirmado', 'ar' => 'تم تأكيد الطلب' ),
        'Préparation' => array( 'en' => 'Preparation', 'es' => 'Preparación', 'ar' => 'التحضير' ),
        'Expédiée' => array( 'en' => 'Shipped', 'es' => 'Enviado', 'ar' => 'تم الشحن' ),
        'En cours de livraison' => array( 'en' => 'Out for delivery', 'es' => 'En reparto', 'ar' => 'قيد التوصيل' ),
        'Livrée' => array( 'en' => 'Delivered', 'es' => 'Entregado', 'ar' => 'تم التسليم' ),
        'Lien de facture invalide.' => array( 'en' => 'Invalid invoice link.', 'es' => 'Enlace de factura no válido.', 'ar' => 'رابط الفاتورة غير صالح.' ),
        'Vous ne pouvez pas télécharger cette facture.' => array( 'en' => 'You cannot download this invoice.', 'es' => 'No puedes descargar esta factura.', 'ar' => 'لا يمكنك تحميل هذه الفاتورة.' ),
        'Facture commande %s' => array( 'en' => 'Order invoice %s', 'es' => 'Factura pedido %s', 'ar' => 'فاتورة الطلب %s' ),
        'Facture commande #%s' => array( 'en' => 'Order invoice #%s', 'es' => 'Factura pedido #%s', 'ar' => 'فاتورة الطلب #%s' ),
        'Total :' => array( 'en' => 'Total:', 'es' => 'Total:', 'ar' => 'الإجمالي:' ),
        'Connectez-vous pour consulter le suivi de vos commandes.' => array( 'en' => 'Sign in to view your order tracking.', 'es' => 'Inicia sesión para consultar el seguimiento de tus pedidos.', 'ar' => 'سجل الدخول لعرض تتبع طلباتك.' ),
        'Consultez en temps réel l’état de vos commandes.' => array( 'en' => 'View your order status in real time.', 'es' => 'Consulta el estado de tus pedidos en tiempo real.', 'ar' => 'اطلع على حالة طلباتك في الوقت الفعلي.' ),
        'Vous n’avez pas encore passé de commande.' => array( 'en' => 'You have not placed an order yet.', 'es' => 'Aún no has realizado ningún pedido.', 'ar' => 'لم تقم بأي طلب بعد.' ),
        'Non renseigné' => array( 'en' => 'Not provided', 'es' => 'No indicado', 'ar' => 'غير مذكور' ),
        'Adresse non renseignée' => array( 'en' => 'Address not provided', 'es' => 'Dirección no indicada', 'ar' => 'العنوان غير مذكور' ),
        'Commande #%s' => array( 'en' => 'Order #%s', 'es' => 'Pedido #%s', 'ar' => 'الطلب #%s' ),
        'Produits commandés' => array( 'en' => 'Ordered products', 'es' => 'Productos pedidos', 'ar' => 'المنتجات المطلوبة' ),
        'Mode de livraison' => array( 'en' => 'Delivery method', 'es' => 'Método de entrega', 'ar' => 'طريقة التوصيل' ),
        'Adresse de livraison' => array( 'en' => 'Delivery address', 'es' => 'Dirección de entrega', 'ar' => 'عنوان التوصيل' ),
        'Transporteur' => array( 'en' => 'Carrier', 'es' => 'Transportista', 'ar' => 'شركة النقل' ),
        'Numéro de suivi' => array( 'en' => 'Tracking number', 'es' => 'Número de seguimiento', 'ar' => 'رقم التتبع' ),
        'Non disponible' => array( 'en' => 'Unavailable', 'es' => 'No disponible', 'ar' => 'غير متوفر' ),
        'Date estimée de livraison' => array( 'en' => 'Estimated delivery date', 'es' => 'Fecha estimada de entrega', 'ar' => 'تاريخ التوصيل المتوقع' ),
        'Non renseignée' => array( 'en' => 'Not provided', 'es' => 'No indicada', 'ar' => 'غير مذكورة' ),
        'Voir les détails' => array( 'en' => 'View details', 'es' => 'Ver detalles', 'ar' => 'عرض التفاصيل' ),
        'Ingrédients naturels' => array( 'en' => 'Natural ingredients', 'es' => 'Ingredientes naturales', 'ar' => 'مكونات طبيعية' ),
        'Aromathérapie : les bienfaits de la lavande fine' => array( 'en' => 'Aromatherapy: the benefits of fine lavender', 'es' => 'Aromaterapia: los beneficios de la lavanda fina', 'ar' => 'العلاج العطري: فوائد اللافندر الناعم' ),
        'Vitamine C : l’actif éclat incontournable' => array( 'en' => 'Vitamin C: the essential radiance active', 'es' => 'Vitamina C: el activo luminosidad imprescindible', 'ar' => 'فيتامين C: المكون الأساسي للإشراقة' ),
        'Masque cheveux réparateur : les bons gestes' => array( 'en' => 'Repairing hair mask: the right gestures', 'es' => 'Mascarilla capilar reparadora: los gestos adecuados', 'ar' => 'ماسك إصلاح الشعر: الخطوات الصحيحة' ),
        'COSM’ÉTHIQUE utilise uniquement les cookies utiles au bon fonctionnement du site et, avec votre accord, des cookies destinés à améliorer l’expérience, mesurer l’audience ou personnaliser certains contenus.' => array( 'en' => 'COSM’ÉTHIQUE only uses cookies needed for the site to work and, with your consent, cookies to improve the experience, measure traffic or personalise certain content.', 'es' => 'COSM’ÉTHIQUE solo utiliza cookies útiles para el funcionamiento del sitio y, con tu consentimiento, cookies para mejorar la experiencia, medir la audiencia o personalizar ciertos contenidos.', 'ar' => 'تستخدم كوزم إيثيك فقط ملفات تعريف الارتباط اللازمة لعمل الموقع، ومع موافقتك ملفات لتحسين التجربة وقياس الجمهور وتخصيص بعض المحتويات.' ),
        'Ils permettent d’utiliser les fonctions essentielles du site : panier, commande, sécurité, compte client et mémorisation de votre choix de consentement.' => array( 'en' => 'They enable essential site functions: cart, order, security, customer account and saving your consent choice.', 'es' => 'Permiten usar funciones esenciales del sitio: carrito, pedido, seguridad, cuenta cliente y memoria de tu consentimiento.', 'ar' => 'تتيح وظائف الموقع الأساسية: السلة والطلب والأمان وحساب العميل وحفظ اختيار الموافقة.' ),
        'Durée : session à 6 mois selon la finalité.' => array( 'en' => 'Duration: session to 6 months depending on purpose.', 'es' => 'Duración: sesión a 6 meses según la finalidad.', 'ar' => 'المدة: من الجلسة إلى 6 أشهر حسب الغرض.' ),
        'Ils nous aident à comprendre les pages consultées et les parcours les plus utiles afin d’améliorer continuellement le site.' => array( 'en' => 'They help us understand viewed pages and useful journeys so we can continually improve the site.', 'es' => 'Nos ayudan a comprender las páginas consultadas y los recorridos más útiles para mejorar continuamente el sitio.', 'ar' => 'تساعدنا على فهم الصفحات والمسارات الأكثر فائدة لتحسين الموقع باستمرار.' ),
        'Durée : 13 mois maximum après consentement.' => array( 'en' => 'Duration: up to 13 months after consent.', 'es' => 'Duración: 13 meses máximo tras el consentimiento.', 'ar' => 'المدة: حتى 13 شهراً بعد الموافقة.' ),
        'Ils servent à mesurer l’efficacité des campagnes et à proposer des contenus plus pertinents, uniquement si vous les acceptez.' => array( 'en' => 'They measure campaign effectiveness and provide more relevant content only if you accept them.', 'es' => 'Sirven para medir la eficacia de campañas y proponer contenidos más pertinentes solo si los aceptas.', 'ar' => 'تستخدم لقياس فعالية الحملات وتقديم محتوى أكثر ملاءمة فقط إذا وافقت عليها.' ),
        'Durée : 6 à 13 mois selon les partenaires.' => array( 'en' => 'Duration: 6 to 13 months depending on partners.', 'es' => 'Duración: 6 a 13 meses según los socios.', 'ar' => 'المدة: من 6 إلى 13 شهراً حسب الشركاء.' ),
        'Ils mémorisent certaines préférences d’affichage et de navigation pour rendre votre expérience plus fluide.' => array( 'en' => 'They remember display and browsing preferences to make your experience smoother.', 'es' => 'Memorizan algunas preferencias de visualización y navegación para que tu experiencia sea más fluida.', 'ar' => 'تتذكر بعض تفضيلات العرض والتصفح لجعل تجربتك أكثر سلاسة.' ),
        'Durée : 6 mois maximum.' => array( 'en' => 'Duration: 6 months maximum.', 'es' => 'Duración: 6 meses máximo.', 'ar' => 'المدة: 6 أشهر كحد أقصى.' ),
        'Sécurité, panier, paiement, compte client, préférence de cookies.' => array( 'en' => 'Security, cart, payment, customer account, cookie preference.', 'es' => 'Seguridad, carrito, pago, cuenta cliente, preferencia de cookies.', 'ar' => 'الأمان والسلة والدفع وحساب العميل وتفضيلات ملفات تعريف الارتباط.' ),
        'Session à 6 mois' => array( 'en' => 'Session to 6 months', 'es' => 'Sesión a 6 meses', 'ar' => 'من الجلسة إلى 6 أشهر' ),
        'Mesure d’audience et amélioration de l’expérience utilisateur.' => array( 'en' => 'Audience measurement and user experience improvement.', 'es' => 'Medición de audiencia y mejora de la experiencia de usuario.', 'ar' => 'قياس الجمهور وتحسين تجربة المستخدم.' ),
        '13 mois maximum' => array( 'en' => '13 months maximum', 'es' => '13 meses máximo', 'ar' => '13 شهراً كحد أقصى' ),
        'Mesure des campagnes et contenus publicitaires personnalisés.' => array( 'en' => 'Campaign measurement and personalised advertising content.', 'es' => 'Medición de campañas y contenidos publicitarios personalizados.', 'ar' => 'قياس الحملات والمحتوى الإعلاني المخصص.' ),
        '6 à 13 mois' => array( 'en' => '6 to 13 months', 'es' => '6 a 13 meses', 'ar' => 'من 6 إلى 13 شهراً' ),
        'Préférences d’affichage, langue, confort de navigation.' => array( 'en' => 'Display preferences, language and browsing comfort.', 'es' => 'Preferencias de visualización, idioma y comodidad de navegación.', 'ar' => 'تفضيلات العرض واللغة وراحة التصفح.' ),
        'Requis sauf cookies techniques' => array( 'en' => 'Required except technical cookies', 'es' => 'Requerido salvo cookies técnicas', 'ar' => 'مطلوب باستثناء الملفات التقنية' ),
        '6 mois maximum' => array( 'en' => '6 months maximum', 'es' => '6 meses máximo', 'ar' => '6 أشهر كحد أقصى' ),
        'Vous pouvez accepter, refuser ou modifier vos préférences à tout moment depuis le lien “Gérer mes cookies” disponible en pied de page. Vous pouvez également supprimer les cookies depuis les réglages de votre navigateur.' => array( 'en' => 'You can accept, refuse or change your preferences at any time from the “Manage my cookies” link in the footer. You can also delete cookies from your browser settings.', 'es' => 'Puedes aceptar, rechazar o modificar tus preferencias en cualquier momento desde el enlace “Gestionar mis cookies” del pie de página. También puedes eliminar cookies desde los ajustes del navegador.', 'ar' => 'يمكنك قبول تفضيلاتك أو رفضها أو تعديلها في أي وقت من رابط “إدارة ملفات تعريف الارتباط” في التذييل. كما يمكنك حذفها من إعدادات المتصفح.' ),
        'Pour toute question concernant vos données personnelles, vous pouvez nous contacter via la page Contact.' => array( 'en' => 'For any question about your personal data, you can contact us through the Contact page.', 'es' => 'Para cualquier pregunta sobre tus datos personales, puedes contactarnos desde la página Contacto.', 'ar' => 'لأي سؤال حول بياناتك الشخصية، يمكنك التواصل معنا عبر صفحة الاتصال.' ),
        'Votre panier beauté' => array( 'en' => 'Your beauty cart', 'es' => 'Tu carrito belleza', 'ar' => 'سلة الجمال الخاصة بك' ),
        'Composez une routine naturelle, sensorielle et responsable.' => array( 'en' => 'Create a natural, sensorial and responsible routine.', 'es' => 'Crea una rutina natural, sensorial y responsable.', 'ar' => 'كوّن روتيناً طبيعياً وحسياً ومسؤولاً.' ),
        'Panier vide' => array( 'en' => 'Empty cart', 'es' => 'Carrito vacío', 'ar' => 'السلة فارغة' ),
        'Votre panier vous attend.' => array( 'en' => 'Your cart is waiting for you.', 'es' => 'Tu carrito te espera.', 'ar' => 'سلتك في انتظارك.' ),
        'Découvrez notre sélection de soins naturels et créez votre routine beauté personnalisée.' => array( 'en' => 'Discover our selection of natural care and create your personalised beauty routine.', 'es' => 'Descubre nuestra selección de cuidados naturales y crea tu rutina de belleza personalizada.', 'ar' => 'اكتشف تشكيلتنا من منتجات العناية الطبيعية وأنشئ روتين جمال مخصصاً.' ),
        'Faire mon diagnostic beauté' => array( 'en' => 'Take my beauty diagnostic', 'es' => 'Hacer mi diagnóstico de belleza', 'ar' => 'إجراء تشخيص الجمال' ),
        'Sélection beauté' => array( 'en' => 'Beauty selection', 'es' => 'Selección belleza', 'ar' => 'اختيار الجمال' ),
        'Vous pourriez aimer...' => array( 'en' => 'You may also like...', 'es' => 'También te puede gustar...', 'ar' => 'قد يعجبك أيضاً...' ),
        'Avantages COSM’ÉTHIQUE' => array( 'en' => 'COSM’ÉTHIQUE benefits', 'es' => 'Ventajas COSM’ÉTHIQUE', 'ar' => 'مزايا كوزم إيثيك' ),
        'Expédition soignée en 24-72h.' => array( 'en' => 'Careful shipping within 24-72h.', 'es' => 'Envío cuidado en 24-72h.', 'ar' => 'شحن بعناية خلال 24-72 ساعة.' ),
        'Solutions fiables et paiement SSL.' => array( 'en' => 'Reliable solutions and SSL payment.', 'es' => 'Soluciones fiables y pago SSL.', 'ar' => 'حلول موثوقة ودفع SSL.' ),
        'Actifs sélectionnés avec exigence.' => array( 'en' => 'Active ingredients selected with high standards.', 'es' => 'Activos seleccionados con exigencia.', 'ar' => 'مكونات فعالة مختارة بعناية.' ),
        'Satisfait ou remboursé' => array( 'en' => 'Satisfied or refunded', 'es' => 'Satisfecho o reembolsado', 'ar' => 'رضا أو استرداد' ),
        'Un achat accompagné avec soin.' => array( 'en' => 'A purchase supported with care.', 'es' => 'Una compra acompañada con cuidado.', 'ar' => 'شراء مدعوم بعناية.' ),
        'Finalisez votre routine naturelle avec une expérience simple, rassurante et élégante.' => array( 'en' => 'Complete your natural routine with a simple, reassuring and elegant experience.', 'es' => 'Finaliza tu rutina natural con una experiencia sencilla, tranquilizadora y elegante.', 'ar' => 'أكمل روتينك الطبيعي بتجربة بسيطة ومطمئنة وأنيقة.' ),
        'Commande sécurisée' => array( 'en' => 'Secure checkout', 'es' => 'Pago seguro', 'ar' => 'طلب آمن' ),
        'Finalisez votre rituel beauté.' => array( 'en' => 'Complete your beauty ritual.', 'es' => 'Finaliza tu ritual de belleza.', 'ar' => 'أكمل طقس جمالك.' ),
        'Un tunnel simple, rassurant et pensé pour protéger vos données jusqu’au paiement.' => array( 'en' => 'A simple, reassuring checkout designed to protect your data through payment.', 'es' => 'Un proceso simple y tranquilizador pensado para proteger tus datos hasta el pago.', 'ar' => 'مسار طلب بسيط ومطمئن مصمم لحماية بياناتك حتى الدفع.' ),
        'Progression de commande' => array( 'en' => 'Order progress', 'es' => 'Progreso del pedido', 'ar' => 'تقدم الطلب' ),
        'Étape 1' => array( 'en' => 'Step 1', 'es' => 'Paso 1', 'ar' => 'الخطوة 1' ),
        'Étape 2' => array( 'en' => 'Step 2', 'es' => 'Paso 2', 'ar' => 'الخطوة 2' ),
        'Étape 3' => array( 'en' => 'Step 3', 'es' => 'Paso 3', 'ar' => 'الخطوة 3' ),
        'Informations client' => array( 'en' => 'Customer information', 'es' => 'Información del cliente', 'ar' => 'معلومات العميل' ),
        'Renseignez vos coordonnées pour préparer votre commande avec soin.' => array( 'en' => 'Enter your details so we can prepare your order with care.', 'es' => 'Introduce tus datos para preparar tu pedido con cuidado.', 'ar' => 'أدخل بياناتك لنجهز طلبك بعناية.' ),
        'Adresse de livraison' => array( 'en' => 'Shipping address', 'es' => 'Dirección de envío', 'ar' => 'عنوان الشحن' ),
        'Choisissez l’adresse où recevoir vos soins Cosm’Éthique.' => array( 'en' => 'Choose the address where you would like to receive your Cosm’Éthique products.', 'es' => 'Elige la dirección donde quieres recibir tus productos Cosm’Éthique.', 'ar' => 'اختر العنوان الذي ترغب في استلام منتجات كوزم إيثيك عليه.' ),
        'Moyen de paiement' => array( 'en' => 'Payment method', 'es' => 'Método de pago', 'ar' => 'طريقة الدفع' ),
        'Choisissez votre mode de paiement' => array( 'en' => 'Choose your payment method', 'es' => 'Elige tu método de pago', 'ar' => 'اختر طريقة الدفع' ),
        'Détails du moyen de paiement' => array( 'en' => 'Payment method details', 'es' => 'Detalles del método de pago', 'ar' => 'تفاصيل طريقة الدفع' ),
        'Numéro de carte' => array( 'en' => 'Card number', 'es' => 'Número de tarjeta', 'ar' => 'رقم البطاقة' ),
        'Nom du titulaire de la carte' => array( 'en' => 'Cardholder name', 'es' => 'Nombre del titular de la tarjeta', 'ar' => 'اسم حامل البطاقة' ),
        'Sophie Martin' => array( 'en' => 'Sophie Martin', 'es' => 'Sophie Martin', 'ar' => 'Sophie Martin' ),
        'Date d’expiration' => array( 'en' => 'Expiry date', 'es' => 'Fecha de caducidad', 'ar' => 'تاريخ الانتهاء' ),
        'MM / AA' => array( 'en' => 'MM / YY', 'es' => 'MM / AA', 'ar' => 'MM / YY' ),
        'Cryptogramme visuel' => array( 'en' => 'Security code', 'es' => 'Criptograma visual', 'ar' => 'رمز الأمان' ),
        'Veuillez compléter correctement les informations de carte bancaire.' => array( 'en' => 'Please complete the card details correctly.', 'es' => 'Completa correctamente los datos de la tarjeta bancaria.', 'ar' => 'يرجى إكمال معلومات البطاقة المصرفية بشكل صحيح.' ),
        'Numéro' => array( 'en' => 'Number', 'es' => 'Número', 'ar' => 'الرقم' ),
        'Nom' => array( 'en' => 'Name', 'es' => 'Nombre', 'ar' => 'الاسم' ),
        'Expiration' => array( 'en' => 'Expiry', 'es' => 'Caducidad', 'ar' => 'تاريخ الانتهاء' ),
        'CVV' => array( 'en' => 'CVV', 'es' => 'CVV', 'ar' => 'CVV' ),
        'Bouton PayPal' => array( 'en' => 'PayPal button', 'es' => 'Botón PayPal', 'ar' => 'زر PayPal' ),
        'Payer avec PayPal' => array( 'en' => 'Pay with PayPal', 'es' => 'Pagar con PayPal', 'ar' => 'الدفع عبر PayPal' ),
        '3x' => array( 'en' => '3x', 'es' => '3x', 'ar' => '3 دفعات' ),
        '4x' => array( 'en' => '4x', 'es' => '4x', 'ar' => '4 دفعات' ),
        'Paiement en 3 fois' => array( 'en' => 'Pay in 3 instalments', 'es' => 'Pago en 3 plazos', 'ar' => 'الدفع على 3 دفعات' ),
        'Paiement en 4 fois' => array( 'en' => 'Pay in 4 instalments', 'es' => 'Pago en 4 plazos', 'ar' => 'الدفع على 4 دفعات' ),
        'Paiement sous 30 jours' => array( 'en' => 'Pay in 30 days', 'es' => 'Pago en 30 días', 'ar' => 'الدفع خلال 30 يوماً' ),
        'Paiement différé' => array( 'en' => 'Deferred payment', 'es' => 'Pago diferido', 'ar' => 'الدفع المؤجل' ),
        'Paiement en 3x, 4x ou différé' => array( 'en' => 'Pay in 3x, 4x or later', 'es' => 'Pago en 3x, 4x o diferido', 'ar' => 'الدفع على 3 أو 4 دفعات أو لاحقاً' ),
        'Paiement en plusieurs mensualités' => array( 'en' => 'Payment over several monthly instalments', 'es' => 'Pago en varias mensualidades', 'ar' => 'الدفع على عدة أقساط شهرية' ),
        'Paiement fractionné sécurisé' => array( 'en' => 'Secure split payment', 'es' => 'Pago fraccionado seguro', 'ar' => 'دفع مقسم وآمن' ),
        'Paiement en 4 fois sans frais si éligible' => array( 'en' => 'Pay in 4 interest-free instalments if eligible', 'es' => 'Pago en 4 plazos sin intereses si es elegible', 'ar' => 'الدفع على 4 دفعات بدون فوائد إذا كنت مؤهلاً' ),
        'Paiement sécurisé SSL' => array( 'en' => 'SSL secure payment', 'es' => 'Pago seguro SSL', 'ar' => 'دفع آمن SSL' ),
        'Sélectionnez une option sécurisée pour valider votre commande.' => array( 'en' => 'Select a secure option to confirm your order.', 'es' => 'Selecciona una opción segura para validar tu pedido.', 'ar' => 'اختر خياراً آمناً لتأكيد طلبك.' ),
        'Résumé de commande' => array( 'en' => 'Order summary', 'es' => 'Resumen del pedido', 'ar' => 'ملخص الطلب' ),
        'Vous avez un code promotionnel ?' => array( 'en' => 'Do you have a promo code?', 'es' => '¿Tienes un código promocional?', 'ar' => 'هل لديك رمز ترويجي؟' ),
        'Ajouter un code' => array( 'en' => 'Add a code', 'es' => 'Añadir un código', 'ar' => 'إضافة رمز' ),
        'Code promo' => array( 'en' => 'Promo code', 'es' => 'Código promocional', 'ar' => 'رمز الخصم' ),
        'Appliquer' => array( 'en' => 'Apply', 'es' => 'Aplicar', 'ar' => 'تطبيق' ),
        'Quantité : %s' => array( 'en' => 'Quantity: %s', 'es' => 'Cantidad: %s', 'ar' => 'الكمية: %s' ),
        'Moyens de paiement acceptés' => array( 'en' => 'Accepted payment methods', 'es' => 'Métodos de pago aceptados', 'ar' => 'طرق الدفع المقبولة' ),
        'Packs & Coffrets' => array( 'en' => 'Sets & Gift boxes', 'es' => 'Packs y cofres', 'ar' => 'المجموعات والصناديق' ),
        'Nos best-sellers' => array( 'en' => 'Our best-sellers', 'es' => 'Nuestros más vendidos', 'ar' => 'الأكثر مبيعاً لدينا' ),
        'Notre histoire' => array( 'en' => 'Our story', 'es' => 'Nuestra historia', 'ar' => 'قصتنا' ),
        'Nos engagements' => array( 'en' => 'Our commitments', 'es' => 'Nuestros compromisos', 'ar' => 'التزاماتنا' ),
        'Nos ingrédients' => array( 'en' => 'Our ingredients', 'es' => 'Nuestros ingredientes', 'ar' => 'مكوناتنا' ),
        'Fabrication & qualité' => array( 'en' => 'Manufacturing & quality', 'es' => 'Fabricación y calidad', 'ar' => 'التصنيع والجودة' ),
        'Nos boutiques' => array( 'en' => 'Our stores', 'es' => 'Nuestras tiendas', 'ar' => 'متاجرنا' ),
        'Maison engagée' => array( 'en' => 'Committed house', 'es' => 'Casa comprometida', 'ar' => 'دار ملتزمة' ),
        'Une cosmétique naturelle, exigeante et responsable, pensée pour prendre soin de la peau sans compromis.' => array( 'en' => 'Natural, demanding and responsible cosmetics designed to care for skin without compromise.', 'es' => 'Cosmética natural, exigente y responsable, pensada para cuidar la piel sin compromisos.', 'ar' => 'مستحضرات طبيعية ومسؤولة صُممت للعناية بالبشرة دون تنازل.' ),
        'Bibliothèque botanique' => array( 'en' => 'Botanical library', 'es' => 'Biblioteca botánica', 'ar' => 'مكتبة نباتية' ),
        'Des actifs naturels sélectionnés avec précision pour leurs bénéfices, leur sensorialité et leur traçabilité.' => array( 'en' => 'Natural active ingredients precisely selected for their benefits, sensoriality and traceability.', 'es' => 'Activos naturales seleccionados con precisión por sus beneficios, sensorialidad y trazabilidad.', 'ar' => 'مكونات فعالة طبيعية مختارة بدقة لفوائدها وحسّيتها وقابليتها للتتبع.' ),
        'Une exigence à chaque étape' => array( 'en' => 'High standards at every step', 'es' => 'Exigencia en cada etapa', 'ar' => 'معايير عالية في كل مرحلة' ),
        'De la matière première au conditionnement, chaque soin suit un processus rigoureux et transparent.' => array( 'en' => 'From raw material to packaging, every product follows a rigorous and transparent process.', 'es' => 'Desde la materia prima hasta el envasado, cada cuidado sigue un proceso riguroso y transparente.', 'ar' => 'من المادة الخام إلى التغليف، يتبع كل منتج عملية دقيقة وشفافة.' ),
        'Besoin d’aide ?' => array( 'en' => 'Need help?', 'es' => '¿Necesitas ayuda?', 'ar' => 'هل تحتاج إلى مساعدة؟' ),
        'Questions fréquentes' => array( 'en' => 'Frequently asked questions', 'es' => 'Preguntas frecuentes', 'ar' => 'الأسئلة الشائعة' ),
        'Toutes les réponses essentielles pour commander, choisir vos soins et profiter sereinement de votre expérience Cosm’Éthique.' => array( 'en' => 'All the essential answers to order, choose your products and enjoy your Cosm’Éthique experience with confidence.', 'es' => 'Todas las respuestas esenciales para comprar, elegir tus cuidados y disfrutar tranquilamente de tu experiencia Cosm’Éthique.', 'ar' => 'كل الإجابات الأساسية للطلب واختيار منتجاتك والاستمتاع بتجربة كوزم إيثيك بثقة.' ),
        'Nos piliers' => array( 'en' => 'Our pillars', 'es' => 'Nuestros pilares', 'ar' => 'ركائزنا' ),
        'Une maison de soin exigeante et consciente.' => array( 'en' => 'A conscious skincare house with exacting standards.', 'es' => 'Una casa de cuidado exigente y consciente.', 'ar' => 'دار عناية واعية بمعايير عالية.' ),
        'Beauté naturelle' => array( 'en' => 'Natural beauty', 'es' => 'Belleza natural', 'ar' => 'جمال طبيعي' ),
        'Des formules inspirées par les actifs végétaux et la sensorialité des rituels de soin.' => array( 'en' => 'Formulas inspired by botanical active ingredients and the sensoriality of skincare rituals.', 'es' => 'Fórmulas inspiradas en activos vegetales y la sensorialidad de los rituales de cuidado.', 'ar' => 'تركيبات مستوحاة من المكونات النباتية وحسية طقوس العناية.' ),
        'Ingrédients responsables' => array( 'en' => 'Responsible ingredients', 'es' => 'Ingredientes responsables', 'ar' => 'مكونات مسؤولة' ),
        'Des actifs choisis pour leur utilité, leur origine et leur cohérence avec nos formules.' => array( 'en' => 'Active ingredients chosen for their purpose, origin and consistency with our formulas.', 'es' => 'Activos elegidos por su utilidad, origen y coherencia con nuestras fórmulas.', 'ar' => 'مكونات فعالة مختارة لفائدتها وأصلها وانسجامها مع تركيباتنا.' ),
        'Fabrication française' => array( 'en' => 'Made in France', 'es' => 'Fabricación francesa', 'ar' => 'صناعة فرنسية' ),
        'Une production maîtrisée avec des exigences qualité précises à chaque étape.' => array( 'en' => 'Controlled production with precise quality requirements at every step.', 'es' => 'Una producción controlada con exigencias de calidad precisas en cada etapa.', 'ar' => 'إنتاج مضبوط بمعايير جودة دقيقة في كل مرحلة.' ),
        'Respect de la planète' => array( 'en' => 'Respect for the planet', 'es' => 'Respeto por el planeta', 'ar' => 'احترام الكوكب' ),
        'Des choix sobres et durables pour accompagner une beauté plus consciente.' => array( 'en' => 'Measured and lasting choices to support more conscious beauty.', 'es' => 'Elecciones sobrias y duraderas para acompañar una belleza más consciente.', 'ar' => 'اختيارات بسيطة ومستدامة لجمال أكثر وعياً.' ),
        'Traçabilité' => array( 'en' => 'Traceability', 'es' => 'Trazabilidad', 'ar' => 'قابلية التتبع' ),
        'Nos engagements se construisent étape par étape.' => array( 'en' => 'Our commitments are built step by step.', 'es' => 'Nuestros compromisos se construyen paso a paso.', 'ar' => 'تُبنى التزاماتنا خطوة بخطوة.' ),
        'Sélectionner' => array( 'en' => 'Select', 'es' => 'Seleccionar', 'ar' => 'اختيار' ),
        'Formuler' => array( 'en' => 'Formulate', 'es' => 'Formular', 'ar' => 'التركيب' ),
        'Fabriquer' => array( 'en' => 'Manufacture', 'es' => 'Fabricar', 'ar' => 'التصنيع' ),
        'Conditionner' => array( 'en' => 'Package', 'es' => 'Envasar', 'ar' => 'التعبئة' ),
        'Nous choisissons des actifs naturels lisibles, sensoriels et utiles.' => array( 'en' => 'We choose natural active ingredients that are clear, sensorial and useful.', 'es' => 'Elegimos activos naturales claros, sensoriales y útiles.', 'ar' => 'نختار مكونات طبيعية واضحة وحسية ومفيدة.' ),
        'Chaque texture est pensée pour associer efficacité, plaisir et douceur.' => array( 'en' => 'Every texture is designed to combine effectiveness, pleasure and softness.', 'es' => 'Cada textura está pensada para unir eficacia, placer y suavidad.', 'ar' => 'كل قوام مصمم ليجمع بين الفعالية والمتعة والنعومة.' ),
        'Les soins suivent un processus responsable et contrôlé.' => array( 'en' => 'Our products follow a responsible and controlled process.', 'es' => 'Los cuidados siguen un proceso responsable y controlado.', 'ar' => 'تتبع منتجاتنا عملية مسؤولة ومراقبة.' ),
        'Nous privilégions des packagings élégants, recyclables et cohérents.' => array( 'en' => 'We prioritise elegant, recyclable and coherent packaging.', 'es' => 'Priorizamos envases elegantes, reciclables y coherentes.', 'ar' => 'نفضل عبوات أنيقة وقابلة لإعادة التدوير ومنسجمة.' ),
        'd’ingrédients naturels' => array( 'en' => 'natural ingredients', 'es' => 'ingredientes naturales', 'ar' => 'مكونات طبيعية' ),
        'test animal' => array( 'en' => 'animal testing', 'es' => 'pruebas en animales', 'ar' => 'اختبار على الحيوانات' ),
        'emballages recyclables' => array( 'en' => 'recyclable packaging', 'es' => 'envases reciclables', 'ar' => 'عبوات قابلة للتدوير' ),
        'clients satisfaits' => array( 'en' => 'satisfied customers', 'es' => 'clientes satisfechos', 'ar' => 'عملاء راضون' ),
        'Bibliothèque active' => array( 'en' => 'Active library', 'es' => 'Biblioteca activa', 'ar' => 'مكتبة المكونات الفعالة' ),
        'Explorer par univers de soin.' => array( 'en' => 'Explore by care universe.', 'es' => 'Explorar por universo de cuidado.', 'ar' => 'استكشف حسب عالم العناية.' ),
        'Produits associés' => array( 'en' => 'Associated products', 'es' => 'Productos asociados', 'ar' => 'المنتجات المرتبطة' ),
        'Découvrir' => array( 'en' => 'Discover', 'es' => 'Descubrir', 'ar' => 'اكتشف' ),
        'Notre sélection d’actifs' => array( 'en' => 'Our active ingredient selection', 'es' => 'Nuestra selección de activos', 'ar' => 'مختاراتنا من المكونات الفعالة' ),
        'Des actifs choisis pour construire des routines lisibles.' => array( 'en' => 'Active ingredients selected to build clear routines.', 'es' => 'Activos seleccionados para crear rutinas claras.', 'ar' => 'مكونات فعالة مختارة لبناء روتينات واضحة.' ),
        'Fiche ingrédient' => array( 'en' => 'Ingredient profile', 'es' => 'Ficha del ingrediente', 'ar' => 'بطاقة المكوّن' ),
        'Fermer' => array( 'en' => 'Close', 'es' => 'Cerrar', 'ar' => 'إغلاق' ),
        'Éclat' => array( 'en' => 'Glow', 'es' => 'Luminosidad', 'ar' => 'إشراقة' ),
        'Confort' => array( 'en' => 'Comfort', 'es' => 'Confort', 'ar' => 'راحة' ),
        'Équilibre' => array( 'en' => 'Balance', 'es' => 'Equilibrio', 'ar' => 'توازن' ),
        'Rose, vitamine E et huiles fines pour réveiller la luminosité naturelle.' => array( 'en' => 'Rose, vitamin E and fine oils to revive natural radiance.', 'es' => 'Rosa, vitamina E y aceites finos para despertar la luminosidad natural.', 'ar' => 'ورد وفيتامين E وزيوت ناعمة لإحياء الإشراقة الطبيعية.' ),
        'Karité, camomille et calendula pour accompagner les peaux en recherche de douceur.' => array( 'en' => 'Shea, chamomile and calendula for skin seeking softness.', 'es' => 'Karité, manzanilla y caléndula para pieles que buscan suavidad.', 'ar' => 'الشيا والبابونج والكالندولا للبشرة التي تبحث عن النعومة.' ),
        'Sauge, argile verte et jojoba pour des routines plus légères et ciblées.' => array( 'en' => 'Sage, green clay and jojoba for lighter, targeted routines.', 'es' => 'Salvia, arcilla verde y jojoba para rutinas más ligeras y específicas.', 'ar' => 'المريمية والطين الأخضر والجوجوبا لروتين أخف وأكثر دقة.' ),
        'Atelier qualité' => array( 'en' => 'Quality workshop', 'es' => 'Taller de calidad', 'ar' => 'ورشة الجودة' ),
        'Une fabrication pensée comme un rituel de précision.' => array( 'en' => 'Manufacturing designed as a precision ritual.', 'es' => 'Una fabricación pensada como un ritual de precisión.', 'ar' => 'تصنيع مصمم كطقس دقيق.' ),
        'Chaque formule avance par étapes : choisir, tester, ajuster, contrôler puis conditionner avec soin. Cette méthode garantit une expérience fiable et premium.' => array( 'en' => 'Every formula moves step by step: choose, test, adjust, control and package with care. This method guarantees a reliable, premium experience.', 'es' => 'Cada fórmula avanza por etapas: elegir, probar, ajustar, controlar y envasar con cuidado. Este método garantiza una experiencia fiable y premium.', 'ar' => 'تتقدم كل تركيبة خطوة بخطوة: اختيار، اختبار، تعديل، مراقبة ثم تعبئة بعناية. تضمن هذه الطريقة تجربة موثوقة وفاخرة.' ),
        'Processus' => array( 'en' => 'Process', 'es' => 'Proceso', 'ar' => 'العملية' ),
        'De l’actif au rituel final.' => array( 'en' => 'From active ingredient to final ritual.', 'es' => 'Del activo al ritual final.', 'ar' => 'من المكوّن الفعال إلى الطقس النهائي.' ),
        'Sélection des matières premières' => array( 'en' => 'Raw material selection', 'es' => 'Selección de materias primas', 'ar' => 'اختيار المواد الخام' ),
        'Nous privilégions des actifs cohérents avec chaque besoin de peau.' => array( 'en' => 'We prioritise active ingredients that match each skin need.', 'es' => 'Priorizamos activos coherentes con cada necesidad de la piel.', 'ar' => 'نفضل مكونات فعالة تناسب كل احتياج للبشرة.' ),
        'Contrôle qualité' => array( 'en' => 'Quality control', 'es' => 'Control de calidad', 'ar' => 'مراقبة الجودة' ),
        'Chaque lot est suivi pour garantir constance et traçabilité.' => array( 'en' => 'Every batch is monitored to ensure consistency and traceability.', 'es' => 'Cada lote se controla para garantizar constancia y trazabilidad.', 'ar' => 'تتم متابعة كل دفعة لضمان الاتساق وقابلية التتبع.' ),
        'Formulation' => array( 'en' => 'Formulation', 'es' => 'Formulación', 'ar' => 'التركيب' ),
        'Les textures sont travaillées pour conjuguer sensorialité et efficacité.' => array( 'en' => 'Textures are crafted to combine sensoriality and effectiveness.', 'es' => 'Las texturas se trabajan para combinar sensorialidad y eficacia.', 'ar' => 'تُصمم القوامات للجمع بين الحسية والفعالية.' ),
        'Fabrication' => array( 'en' => 'Manufacturing', 'es' => 'Fabricación', 'ar' => 'التصنيع' ),
        'La production respecte un cahier des charges précis et responsable.' => array( 'en' => 'Production follows precise and responsible specifications.', 'es' => 'La producción respeta unas especificaciones precisas y responsables.', 'ar' => 'يتبع الإنتاج مواصفات دقيقة ومسؤولة.' ),
        'Conditionnement' => array( 'en' => 'Packaging', 'es' => 'Envasado', 'ar' => 'التعبئة' ),
        'Les packagings protègent les soins et valorisent l’expérience.' => array( 'en' => 'Packaging protects the products and enhances the experience.', 'es' => 'Los envases protegen los cuidados y valorizan la experiencia.', 'ar' => 'تحمي العبوات المنتجات وتعزز التجربة.' ),
        'Expédition' => array( 'en' => 'Shipping', 'es' => 'Expedición', 'ar' => 'الشحن' ),
        'Les commandes sont préparées avec soin pour préserver les produits.' => array( 'en' => 'Orders are prepared carefully to preserve the products.', 'es' => 'Los pedidos se preparan con cuidado para preservar los productos.', 'ar' => 'تُجهز الطلبات بعناية للحفاظ على المنتجات.' ),
        'Origine naturelle' => array( 'en' => 'Natural origin', 'es' => 'Origen natural', 'ar' => 'أصل طبيعي' ),
        'Vegan friendly' => array( 'en' => 'Vegan friendly', 'es' => 'Apto para veganos', 'ar' => 'مناسب للنباتيين' ),
        'Fabrication responsable' => array( 'en' => 'Responsible manufacturing', 'es' => 'Fabricación responsable', 'ar' => 'تصنيع مسؤول' ),
        'Dans les coulisses' => array( 'en' => 'Behind the scenes', 'es' => 'Entre bastidores', 'ar' => 'خلف الكواليس' ),
        'Une qualité visible jusque dans les détails.' => array( 'en' => 'Quality visible down to the details.', 'es' => 'Una calidad visible hasta en los detalles.', 'ar' => 'جودة ظاهرة حتى في التفاصيل.' ),
        'Le laboratoire' => array( 'en' => 'The laboratory', 'es' => 'El laboratorio', 'ar' => 'المختبر' ),
        'Les matières premières' => array( 'en' => 'Raw materials', 'es' => 'Materias primas', 'ar' => 'المواد الخام' ),
        'Les tests qualité' => array( 'en' => 'Quality tests', 'es' => 'Pruebas de calidad', 'ar' => 'اختبارات الجودة' ),
        'Le packaging' => array( 'en' => 'Packaging', 'es' => 'El packaging', 'ar' => 'التغليف' ),
        'Pourquoi choisir Cosm’Éthique' => array( 'en' => 'Why choose Cosm’Éthique', 'es' => 'Por qué elegir Cosm’Éthique', 'ar' => 'لماذا تختار كوزم إيثيك' ),
        'Une exigence premium, simple à comprendre.' => array( 'en' => 'Premium standards, easy to understand.', 'es' => 'Una exigencia premium fácil de entender.', 'ar' => 'معايير فاخرة سهلة الفهم.' ),
        'Sensorialité' => array( 'en' => 'Sensoriality', 'es' => 'Sensorialidad', 'ar' => 'حسية' ),
        'Lisibilité' => array( 'en' => 'Clarity', 'es' => 'Claridad', 'ar' => 'وضوح' ),
        'Rigueur' => array( 'en' => 'Rigour', 'es' => 'Rigor', 'ar' => 'صرامة' ),
        'Centre d’aide' => array( 'en' => 'Help centre', 'es' => 'Centro de ayuda', 'ar' => 'مركز المساعدة' ),
        'Rechercher une réponse.' => array( 'en' => 'Search for an answer.', 'es' => 'Buscar una respuesta.', 'ar' => 'ابحث عن إجابة.' ),
        'Rechercher une question' => array( 'en' => 'Search a question', 'es' => 'Buscar una pregunta', 'ar' => 'ابحث عن سؤال' ),
        'Rechercher une question...' => array( 'en' => 'Search a question...', 'es' => 'Buscar una pregunta...', 'ar' => 'ابحث عن سؤال...' ),
        'Les questions les plus fréquentes' => array( 'en' => 'Most frequent questions', 'es' => 'Preguntas más frecuentes', 'ar' => 'الأسئلة الأكثر شيوعاً' ),
        'Les réponses à consulter en priorité.' => array( 'en' => 'The answers to check first.', 'es' => 'Las respuestas que consultar primero.', 'ar' => 'الإجابات التي يجب مراجعتها أولاً.' ),
        'Diagnostic beauté' => array( 'en' => 'Beauty diagnostic', 'es' => 'Diagnóstico de belleza', 'ar' => 'تشخيص الجمال' ),
        'Le diagnostic vous aide à composer une routine adaptée en moins d’une minute.' => array( 'en' => 'The diagnostic helps you build a suitable routine in under a minute.', 'es' => 'El diagnóstico te ayuda a crear una rutina adaptada en menos de un minuto.', 'ar' => 'يساعدك التشخيص على بناء روتين مناسب في أقل من دقيقة.' ),
        'Vos données sont protégées et chiffrées grâce au protocole SSL.' => array( 'en' => 'Your data is protected and encrypted through SSL.', 'es' => 'Tus datos están protegidos y cifrados mediante SSL.', 'ar' => 'بياناتك محمية ومشفرة عبر SSL.' ),
        'Retours' => array( 'en' => 'Returns', 'es' => 'Devoluciones', 'ar' => 'الإرجاع' ),
        'Besoin d’un conseil' => array( 'en' => 'Need advice', 'es' => 'Necesitas consejo', 'ar' => 'هل تحتاج إلى نصيحة' ),
        'Vous n’avez pas trouvé votre réponse ?' => array( 'en' => 'Didn’t find your answer?', 'es' => '¿No encontraste tu respuesta?', 'ar' => 'لم تجد إجابتك؟' ),
        'Notre équipe vous accompagne pour choisir vos soins, suivre une commande ou préparer un projet de franchise.' => array( 'en' => 'Our team helps you choose products, track an order or prepare a franchise project.', 'es' => 'Nuestro equipo te ayuda a elegir productos, seguir un pedido o preparar un proyecto de franquicia.', 'ar' => 'يساعدك فريقنا في اختيار المنتجات أو تتبع طلب أو إعداد مشروع امتياز.' ),
        'Contacter notre équipe' => array( 'en' => 'Contact our team', 'es' => 'Contactar con nuestro equipo', 'ar' => 'تواصل مع فريقنا' ),
        'Quand ma commande est-elle expédiée ?' => array( 'en' => 'When is my order shipped?', 'es' => '¿Cuándo se envía mi pedido?', 'ar' => 'متى يتم شحن طلبي؟' ),
        'Les commandes sont préparées sous 24 à 48h ouvrées, puis confiées au transporteur.' => array( 'en' => 'Orders are prepared within 24 to 48 business hours, then handed to the carrier.', 'es' => 'Los pedidos se preparan en 24 a 48 horas laborables y luego se entregan al transportista.', 'ar' => 'تُجهز الطلبات خلال 24 إلى 48 ساعة عمل ثم تُسلّم إلى شركة النقل.' ),
        'La livraison est-elle offerte ?' => array( 'en' => 'Is delivery free?', 'es' => '¿El envío es gratuito?', 'ar' => 'هل التوصيل مجاني؟' ),
        'La livraison est offerte dès 40 € d’achat en France métropolitaine.' => array( 'en' => 'Delivery is free from €40 purchase in mainland France.', 'es' => 'El envío es gratis desde 40 € de compra en Francia metropolitana.', 'ar' => 'التوصيل مجاني ابتداءً من 40€ داخل فرنسا.' ),
        'Puis-je modifier une commande ?' => array( 'en' => 'Can I change an order?', 'es' => '¿Puedo modificar un pedido?', 'ar' => 'هل يمكنني تعديل الطلب؟' ),
        'Contactez-nous rapidement après validation afin que nous puissions vérifier les possibilités.' => array( 'en' => 'Contact us quickly after confirmation so we can check what is possible.', 'es' => 'Contáctanos rápidamente tras la validación para comprobar las posibilidades.', 'ar' => 'تواصل معنا سريعاً بعد التأكيد لنتمكن من التحقق من الخيارات الممكنة.' ),
        'Comment suivre ma commande ?' => array( 'en' => 'How can I track my order?', 'es' => '¿Cómo puedo seguir mi pedido?', 'ar' => 'كيف يمكنني تتبع طلبي؟' ),
        'Le suivi est disponible depuis votre espace client lorsque la commande est expédiée.' => array( 'en' => 'Tracking is available in your customer account once the order has shipped.', 'es' => 'El seguimiento está disponible en tu cuenta cuando se envía el pedido.', 'ar' => 'يتوفر التتبع في حسابك بمجرد شحن الطلب.' ),
        'Le paiement est-il sécurisé ?' => array( 'en' => 'Is payment secure?', 'es' => '¿El pago es seguro?', 'ar' => 'هل الدفع آمن؟' ),
        'Oui, les paiements sont protégés par chiffrement SSL et des solutions de paiement reconnues.' => array( 'en' => 'Yes, payments are protected by SSL encryption and recognised payment solutions.', 'es' => 'Sí, los pagos están protegidos por cifrado SSL y soluciones de pago reconocidas.', 'ar' => 'نعم، المدفوعات محمية بتشفير SSL وحلول دفع معروفة.' ),
        'Puis-je payer en plusieurs fois ?' => array( 'en' => 'Can I pay in instalments?', 'es' => '¿Puedo pagar a plazos?', 'ar' => 'هل يمكنني الدفع على أقساط؟' ),
        'Des options de paiement fractionné peuvent être proposées selon le montant et l’éligibilité.' => array( 'en' => 'Split payment options may be offered depending on the amount and eligibility.', 'es' => 'Pueden ofrecerse opciones de pago fraccionado según el importe y la elegibilidad.', 'ar' => 'قد تتوفر خيارات الدفع المقسم حسب المبلغ والأهلية.' ),
        'Dois-je créer un compte ?' => array( 'en' => 'Do I need to create an account?', 'es' => '¿Tengo que crear una cuenta?', 'ar' => 'هل يجب علي إنشاء حساب؟' ),
        'Le compte permet de retrouver vos commandes, recommandations et informations plus facilement.' => array( 'en' => 'An account makes it easier to find your orders, recommendations and information.', 'es' => 'La cuenta permite encontrar tus pedidos, recomendaciones e información más fácilmente.', 'ar' => 'يسهّل الحساب العثور على طلباتك وتوصياتك ومعلوماتك.' ),
        'Mes données sont-elles protégées ?' => array( 'en' => 'Is my data protected?', 'es' => '¿Mis datos están protegidos?', 'ar' => 'هل بياناتي محمية؟' ),
        'Nous traitons vos données avec attention et uniquement pour les finalités nécessaires.' => array( 'en' => 'We process your data carefully and only for necessary purposes.', 'es' => 'Tratamos tus datos con cuidado y solo para las finalidades necesarias.', 'ar' => 'نعالج بياناتك بعناية وللأغراض الضرورية فقط.' ),
        'Le diagnostic est-il gratuit ?' => array( 'en' => 'Is the diagnostic free?', 'es' => '¿El diagnóstico es gratuito?', 'ar' => 'هل التشخيص مجاني؟' ),
        'Oui, il permet d’obtenir une routine indicative en moins d’une minute.' => array( 'en' => 'Yes, it provides an indicative routine in under a minute.', 'es' => 'Sí, permite obtener una rutina orientativa en menos de un minuto.', 'ar' => 'نعم، يمنحك روتيناً إرشادياً في أقل من دقيقة.' ),
        'Puis-je recommencer le diagnostic ?' => array( 'en' => 'Can I restart the diagnostic?', 'es' => '¿Puedo repetir el diagnóstico?', 'ar' => 'هل يمكنني إعادة التشخيص؟' ),
        'Oui, vous pouvez le relancer à tout moment pour adapter votre routine.' => array( 'en' => 'Yes, you can restart it at any time to adjust your routine.', 'es' => 'Sí, puedes repetirlo en cualquier momento para adaptar tu rutina.', 'ar' => 'نعم، يمكنك إعادته في أي وقت لتعديل روتينك.' ),
        'Les soins conviennent-ils aux peaux sensibles ?' => array( 'en' => 'Are the products suitable for sensitive skin?', 'es' => '¿Los productos son aptos para piel sensible?', 'ar' => 'هل المنتجات مناسبة للبشرة الحساسة؟' ),
        'Chaque fiche produit précise les types de peau recommandés et les conseils d’utilisation.' => array( 'en' => 'Each product page states recommended skin types and usage advice.', 'es' => 'Cada ficha de producto indica los tipos de piel recomendados y consejos de uso.', 'ar' => 'توضح كل صفحة منتج أنواع البشرة الموصى بها ونصائح الاستخدام.' ),
        'Les produits sont-ils testés sur les animaux ?' => array( 'en' => 'Are the products tested on animals?', 'es' => '¿Los productos se prueban en animales?', 'ar' => 'هل تُختبر المنتجات على الحيوانات؟' ),
        'Non, Cosm’Éthique s’inscrit dans une démarche cruelty free.' => array( 'en' => 'No, Cosm’Éthique follows a cruelty-free approach.', 'es' => 'No, Cosm’Éthique sigue un enfoque cruelty free.', 'ar' => 'لا، تتبع كوزم إيثيك نهجاً خالياً من القسوة.' ),
        'Puis-je retourner un produit ?' => array( 'en' => 'Can I return a product?', 'es' => '¿Puedo devolver un producto?', 'ar' => 'هل يمكنني إرجاع منتج؟' ),
        'Les conditions de retour sont détaillées dans les CGV du site.' => array( 'en' => 'Return conditions are detailed in the site terms of sale.', 'es' => 'Las condiciones de devolución se detallan en las CGV del sitio.', 'ar' => 'تُفصّل شروط الإرجاع في شروط البيع على الموقع.' ),
        'Quel est le délai de retour ?' => array( 'en' => 'What is the return period?', 'es' => '¿Cuál es el plazo de devolución?', 'ar' => 'ما مدة الإرجاع؟' ),
        'Le délai indiqué est de 30 jours selon les conditions applicables.' => array( 'en' => 'The stated return period is 30 days according to applicable conditions.', 'es' => 'El plazo indicado es de 30 días según las condiciones aplicables.', 'ar' => 'مدة الإرجاع المذكورة 30 يوماً حسب الشروط المعمول بها.' ),
        'Comment devenir franchisé ?' => array( 'en' => 'How can I become a franchisee?', 'es' => '¿Cómo convertirse en franquiciado?', 'ar' => 'كيف أصبح صاحب امتياز؟' ),
        'La page Devenir franchisé présente le concept et le formulaire de demande.' => array( 'en' => 'The Become a franchisee page presents the concept and request form.', 'es' => 'La página Devenir franchisé presenta el concepto y el formulario de solicitud.', 'ar' => 'تعرض صفحة الانضمام كصاحب امتياز المفهوم ونموذج الطلب.' ),
        'Quels profils recherchez-vous ?' => array( 'en' => 'What profiles are you looking for?', 'es' => '¿Qué perfiles buscáis?', 'ar' => 'ما الملفات الشخصية التي تبحثون عنها؟' ),
        'Des profils sensibles à la beauté naturelle, au commerce premium et au conseil client.' => array( 'en' => 'Profiles interested in natural beauty, premium retail and customer advice.', 'es' => 'Perfiles sensibles a la belleza natural, el comercio premium y el asesoramiento al cliente.', 'ar' => 'أشخاص مهتمون بالجمال الطبيعي والتجارة الراقية واستشارة العملاء.' ),
        'Aucun test sur les animaux, dans une démarche responsable et transparente.' => array( 'en' => 'No animal testing, as part of a responsible and transparent approach.', 'es' => 'Ninguna prueba en animales, dentro de un enfoque responsable y transparente.', 'ar' => 'لا اختبارات على الحيوانات ضمن نهج مسؤول وشفاف.' ),
        'Des contenants conçus pour durer, se recycler ou limiter le superflu.' => array( 'en' => 'Containers designed to last, be recycled or limit the unnecessary.', 'es' => 'Envases pensados para durar, reciclarse o limitar lo superfluo.', 'ar' => 'عبوات مصممة لتدوم أو يعاد تدويرها أو تقلل الزائد.' ),
        'Transparence' => array( 'en' => 'Transparency', 'es' => 'Transparencia', 'ar' => 'الشفافية' ),
        'Des informations claires sur les actifs, les bénéfices et l’usage de chaque soin.' => array( 'en' => 'Clear information on active ingredients, benefits and how to use each product.', 'es' => 'Información clara sobre activos, beneficios y uso de cada cuidado.', 'ar' => 'معلومات واضحة عن المكونات الفعالة والفوائد وطريقة استخدام كل منتج.' ),
        'Qualité premium' => array( 'en' => 'Premium quality', 'es' => 'Calidad premium', 'ar' => 'جودة فاخرة' ),
        'Une expérience haut de gamme, du packaging à l’application sur la peau.' => array( 'en' => 'A high-end experience, from packaging to application on the skin.', 'es' => 'Una experiencia de alta gama, desde el packaging hasta la aplicación.', 'ar' => 'تجربة راقية من التغليف حتى التطبيق على البشرة.' ),
        'Engagement écologique Cosm’Éthique' => array( 'en' => 'Cosm’Éthique ecological commitment', 'es' => 'Compromiso ecológico Cosm’Éthique', 'ar' => 'التزام كوزم إيثيك البيئي' ),
        'Notre promesse' => array( 'en' => 'Our promise', 'es' => 'Nuestra promesa', 'ar' => 'وعدنا' ),
        'Faire mieux, avec moins de compromis.' => array( 'en' => 'Do better, with fewer compromises.', 'es' => 'Hacerlo mejor, con menos compromisos.', 'ar' => 'ننجز الأفضل بتنازلات أقل.' ),
        'Cosm’Éthique associe plaisir d’utilisation, exigence de formulation et responsabilité. Chaque décision vise à créer une beauté plus lisible, plus douce et plus durable.' => array( 'en' => 'Cosm’Éthique combines pleasure of use, formulation standards and responsibility. Every decision aims to create clearer, gentler and more lasting beauty.', 'es' => 'Cosm’Éthique combina placer de uso, exigencia de formulación y responsabilidad. Cada decisión busca crear una belleza más clara, suave y duradera.', 'ar' => 'تجمع كوزم إيثيك بين متعة الاستخدام ومعايير التركيب والمسؤولية. يهدف كل قرار إلى جمال أوضح وأنعم وأكثر استدامة.' ),
        'Actifs d’origine naturelle sélectionnés avec soin' => array( 'en' => 'Naturally derived active ingredients carefully selected', 'es' => 'Activos de origen natural seleccionados con cuidado', 'ar' => 'مكونات فعالة طبيعية مختارة بعناية' ),
        'Formules sûres, efficaces et sensorielles' => array( 'en' => 'Safe, effective and sensorial formulas', 'es' => 'Fórmulas seguras, eficaces y sensoriales', 'ar' => 'تركيبات آمنة وفعالة وحسية' ),
        'Expérience premium sans surconsommation inutile' => array( 'en' => 'Premium experience without unnecessary overconsumption', 'es' => 'Experiencia premium sin sobreconsumo innecesario', 'ar' => 'تجربة فاخرة دون استهلاك زائد غير ضروري' ),
        'Hydrate, illumine et apporte de l’éclat.' => array( 'en' => 'Hydrates, illuminates and brings radiance.', 'es' => 'Hidrata, ilumina y aporta luminosidad.', 'ar' => 'يرطب ويضيء ويمنح إشراقة.' ),
        'Nourrit intensément et restaure le confort.' => array( 'en' => 'Deeply nourishes and restores comfort.', 'es' => 'Nutre intensamente y restaura el confort.', 'ar' => 'يغذي بعمق ويعيد الراحة.' ),
        'Apaise et aide à réduire les sensations d’inconfort.' => array( 'en' => 'Soothes and helps reduce feelings of discomfort.', 'es' => 'Calma y ayuda a reducir la sensación de incomodidad.', 'ar' => 'يهدئ ويساعد على تقليل الشعور بعدم الراحة.' ),
        'Équilibre, purifie et accompagne les routines légères.' => array( 'en' => 'Balances, purifies and supports lightweight routines.', 'es' => 'Equilibra, purifica y acompaña rutinas ligeras.', 'ar' => 'يوازن وينقي ويدعم الروتين الخفيف.' ),
        'Signature relaxante et sensation de bien-être.' => array( 'en' => 'Relaxing signature and feeling of well-being.', 'es' => 'Firma relajante y sensación de bienestar.', 'ar' => 'لمسة مهدئة وإحساس بالراحة.' ),
        'Adoucit et accompagne les peaux fragilisées.' => array( 'en' => 'Softens and supports weakened skin.', 'es' => 'Suaviza y acompaña las pieles fragilizadas.', 'ar' => 'ينعم ويدعم البشرة الضعيفة.' ),
        'Aide à équilibrer et à nourrir sans fini lourd.' => array( 'en' => 'Helps balance and nourish without a heavy finish.', 'es' => 'Ayuda a equilibrar y nutrir sin acabado pesado.', 'ar' => 'يساعد على التوازن والتغذية دون ملمس ثقيل.' ),
        'Assouplit, nourrit et laisse la peau plus douce.' => array( 'en' => 'Softens, nourishes and leaves skin smoother.', 'es' => 'Flexibiliza, nutre y deja la piel más suave.', 'ar' => 'يلين ويغذي ويترك البشرة أنعم.' ),
        'Purifie les pores et affine visuellement le grain de peau.' => array( 'en' => 'Purifies pores and visibly refines skin texture.', 'es' => 'Purifica los poros y afina visiblemente la textura de la piel.', 'ar' => 'ينقي المسام ويحسن مظهر ملمس البشرة.' ),
        'Protège les formules et accompagne l’éclat de la peau.' => array( 'en' => 'Protects formulas and supports skin radiance.', 'es' => 'Protege las fórmulas y acompaña la luminosidad de la piel.', 'ar' => 'يحمي التركيبات ويدعم إشراقة البشرة.' ),
        'Apporte confort, nutrition et texture fondante.' => array( 'en' => 'Brings comfort, nourishment and a melting texture.', 'es' => 'Aporta confort, nutrición y textura fundente.', 'ar' => 'يوفر الراحة والتغذية وقواماً يذوب على البشرة.' ),
        'Peaux ternes et déshydratées' => array( 'en' => 'Dull and dehydrated skin', 'es' => 'Piel apagada y deshidratada', 'ar' => 'بشرة باهتة وجافة' ),
        'Peaux sèches, cheveux secs' => array( 'en' => 'Dry skin, dry hair', 'es' => 'Piel seca, cabello seco', 'ar' => 'بشرة جافة وشعر جاف' ),
        'Peaux sensibles' => array( 'en' => 'Sensitive skin', 'es' => 'Piel sensible', 'ar' => 'بشرة حساسة' ),
        'Peaux mixtes, cuir chevelu' => array( 'en' => 'Combination skin, scalp', 'es' => 'Piel mixta, cuero cabelludo', 'ar' => 'بشرة مختلطة وفروة رأس' ),
        'Peaux mixtes, cheveux ternes' => array( 'en' => 'Combination skin, dull hair', 'es' => 'Piel mixta, cabello apagado', 'ar' => 'بشرة مختلطة وشعر باهت' ),
        'Peaux sèches à très sèches' => array( 'en' => 'Dry to very dry skin', 'es' => 'Piel seca a muy seca', 'ar' => 'بشرة جافة إلى شديدة الجفاف' ),
        'Afrique de l’Ouest' => array( 'en' => 'West Africa', 'es' => 'África Occidental', 'ar' => 'غرب أفريقيا' ),
        'Bassin méditerranéen' => array( 'en' => 'Mediterranean basin', 'es' => 'Cuenca mediterránea', 'ar' => 'حوض البحر المتوسط' ),
        'Amérique du Sud' => array( 'en' => 'South America', 'es' => 'América del Sur', 'ar' => 'أمريكا الجنوبية' ),
        'Origine végétale' => array( 'en' => 'Plant origin', 'es' => 'Origen vegetal', 'ar' => 'أصل نباتي' ),
        'La rose est utilisée pour sa douceur sensorielle et son effet éclat. Elle accompagne les routines visage qui cherchent à hydrater, lisser et réveiller la luminosité naturelle.' => array( 'en' => 'Rose is used for its sensorial softness and glow effect. It supports facial routines that aim to hydrate, smooth and revive natural radiance.', 'es' => 'La rosa se utiliza por su suavidad sensorial y su efecto luminosidad. Acompaña rutinas faciales que buscan hidratar, alisar y despertar la luz natural.', 'ar' => 'يستخدم الورد لنعومته الحسية وتأثيره المشرق، ويدعم روتينات الوجه التي تهدف إلى الترطيب والتنعيم وإحياء الإشراقة الطبيعية.' ),
        'Le karité apporte une nutrition généreuse et un fini protecteur. Il est idéal pour les zones sèches, les longueurs fragilisées et les textures riches.' => array( 'en' => 'Shea brings generous nourishment and a protective finish. It is ideal for dry areas, fragile lengths and rich textures.', 'es' => 'El karité aporta una nutrición generosa y un acabado protector. Es ideal para zonas secas, largos fragilizados y texturas ricas.', 'ar' => 'يوفر الشيا تغذية غنية ولمسة واقية، وهو مثالي للمناطق الجافة والأطراف الضعيفة والقوام الغني.' ),
        'La camomille est choisie pour son profil doux et réconfortant. Elle accompagne les peaux sensibles qui recherchent une routine simple et apaisante.' => array( 'en' => 'Chamomile is chosen for its gentle, comforting profile. It supports sensitive skin looking for a simple, soothing routine.', 'es' => 'La manzanilla se elige por su perfil suave y reconfortante. Acompaña las pieles sensibles que buscan una rutina sencilla y calmante.', 'ar' => 'اختير البابونج لطابعه اللطيف والمريح، ويدعم البشرة الحساسة التي تبحث عن روتين بسيط ومهدئ.' ),
        'La sauge apporte une sensation de fraîcheur et d’équilibre. Elle est particulièrement intéressante dans les soins visage légers et les routines capillaires douces.' => array( 'en' => 'Sage brings a feeling of freshness and balance. It is especially valuable in lightweight facial care and gentle hair routines.', 'es' => 'La salvia aporta frescor y equilibrio. Es especialmente interesante en cuidados faciales ligeros y rutinas capilares suaves.', 'ar' => 'تمنح المريمية إحساساً بالانتعاش والتوازن، وهي مناسبة للعناية الخفيفة بالوجه وروتين الشعر اللطيف.' ),
        'La lavande signe des rituels relaxants et raffinés. Elle évoque la Provence, le soin du soir et les textures enveloppantes.' => array( 'en' => 'Lavender signs relaxing, refined rituals. It evokes Provence, evening care and enveloping textures.', 'es' => 'La lavanda firma rituales relajantes y refinados. Evoca la Provenza, el cuidado nocturno y texturas envolventes.', 'ar' => 'تمنح اللافندر طقوساً مهدئة وراقية، وتستحضر بروفانس والعناية المسائية والقوام الغامر.' ),
        'Le calendula est associé aux routines de confort. Il soutient les soins pensés pour adoucir, protéger et améliorer la sensation de souplesse.' => array( 'en' => 'Calendula is associated with comfort routines. It supports products designed to soften, protect and improve the feeling of suppleness.', 'es' => 'La caléndula se asocia a rutinas de confort. Acompaña cuidados pensados para suavizar, proteger y mejorar la sensación de flexibilidad.', 'ar' => 'يرتبط الكالندولا بروتين الراحة ويدعم المنتجات المصممة للتنعيم والحماية وتحسين الإحساس بالمرونة.' ),
        'L’huile de jojoba est appréciée pour son toucher fin et équilibrant. Elle nourrit sans alourdir et trouve sa place dans les soins visage comme capillaires.' => array( 'en' => 'Jojoba oil is appreciated for its fine, balancing feel. It nourishes without weighing down and works in both facial and hair care.', 'es' => 'El aceite de jojoba se aprecia por su tacto fino y equilibrante. Nutre sin apelmazar y encaja tanto en cuidados faciales como capilares.', 'ar' => 'يُقدّر زيت الجوجوبا لملمسه الخفيف والمتوازن، فهو يغذي دون إثقال ويناسب عناية الوجه والشعر.' ),
        'L’amande douce apporte une sensorialité ronde et confortable. Elle est idéale pour les soins corps nourrissants et les massages délicats.' => array( 'en' => 'Sweet almond brings a rounded, comforting sensoriality. It is ideal for nourishing body care and gentle massages.', 'es' => 'La almendra dulce aporta una sensorialidad redonda y confortable. Es ideal para cuidados corporales nutritivos y masajes delicados.', 'ar' => 'يوفر اللوز الحلو حسية ناعمة ومريحة، وهو مثالي لعناية الجسم المغذية والتدليك اللطيف.' ),
        'L’argile verte est un incontournable des routines purifiantes. Elle aide à absorber l’excès de sébum et à retrouver une peau nette.' => array( 'en' => 'Green clay is essential in purifying routines. It helps absorb excess sebum and restore clearer-looking skin.', 'es' => 'La arcilla verde es esencial en las rutinas purificantes. Ayuda a absorber el exceso de sebo y recuperar una piel limpia.', 'ar' => 'الطين الأخضر أساسي في الروتين المنقي، فهو يساعد على امتصاص الدهون الزائدة واستعادة مظهر بشرة صافٍ.' ),
        'La vitamine E est intégrée pour soutenir la stabilité des formules et enrichir les rituels qui recherchent douceur, confort et éclat.' => array( 'en' => 'Vitamin E is included to support formula stability and enrich rituals seeking softness, comfort and radiance.', 'es' => 'La vitamina E se integra para apoyar la estabilidad de las fórmulas y enriquecer rituales de suavidad, confort y luminosidad.', 'ar' => 'يدخل فيتامين E لدعم ثبات التركيبات وإثراء الطقوس التي تبحث عن النعومة والراحة والإشراقة.' ),
        'Le beurre de cacao donne du corps aux textures riches. Il apporte une sensation enveloppante et une nutrition durable.' => array( 'en' => 'Cocoa butter gives body to rich textures. It brings an enveloping feel and lasting nourishment.', 'es' => 'La manteca de cacao da cuerpo a las texturas ricas. Aporta una sensación envolvente y nutrición duradera.', 'ar' => 'يعطي زبدة الكاكاو قواماً للتركيبات الغنية ويوفر إحساساً مغلفاً وتغذية دائمة.' ),
        'Sérum Éclat à la Rose, Routine Visage' => array( 'en' => 'Rose Glow Serum, Face Routine', 'es' => 'Sérum Luminosidad de Rosa, Rutina Facial', 'ar' => 'سيروم الإشراقة بالورد، روتين الوجه' ),
        'Baume Corps Karité & Amande, Après-Shampooing Aloe Vera & Karité' => array( 'en' => 'Shea & Almond Body Balm, Aloe Vera & Shea Conditioner', 'es' => 'Bálsamo Corporal Karité y Almendra, Acondicionador Aloe Vera y Karité', 'ar' => 'بلسم الجسم بالشيا واللوز، بلسم شعر بالألوفيرا والشيا' ),
        'Crème Hydratante Sauge & Camomille' => array( 'en' => 'Sage & Chamomile Moisturising Cream', 'es' => 'Crema Hidratante Salvia y Manzanilla', 'ar' => 'كريم مرطب بالمريمية والبابونج' ),
        'Crème Hydratante Sauge & Camomille, Shampooing Doux Sauge & Ortie' => array( 'en' => 'Sage & Chamomile Moisturising Cream, Sage & Nettle Gentle Shampoo', 'es' => 'Crema Hidratante Salvia y Manzanilla, Champú Suave Salvia y Ortiga', 'ar' => 'كريم مرطب بالمريمية والبابونج، شامبو لطيف بالمريمية والقراص' ),
        'Huile Essentielle Lavande Fine, Gommage Corps Sucre & Lavande' => array( 'en' => 'Fine Lavender Essential Oil, Sugar & Lavender Body Scrub', 'es' => 'Aceite Esencial de Lavanda Fina, Exfoliante Corporal Azúcar y Lavanda', 'ar' => 'زيت اللافندر الأساسي، مقشر الجسم بالسكر واللافندر' ),
        'Huile de Soin Nourrissante, Lait Corps Hydratant' => array( 'en' => 'Nourishing Care Oil, Hydrating Body Milk', 'es' => 'Aceite de Cuidado Nutritivo, Leche Corporal Hidratante', 'ar' => 'زيت عناية مغذٍ، حليب جسم مرطب' ),
        'Huile de Soin Nourrissante, Sérum Pointes Nourrissant' => array( 'en' => 'Nourishing Care Oil, Nourishing Ends Serum', 'es' => 'Aceite de Cuidado Nutritivo, Sérum Nutritivo para Puntas', 'ar' => 'زيت عناية مغذٍ، سيروم مغذٍ للأطراف' ),
        'Baume Corps Karité & Amande, Huile de Massage' => array( 'en' => 'Shea & Almond Body Balm, Massage Oil', 'es' => 'Bálsamo Corporal Karité y Almendra, Aceite de Masaje', 'ar' => 'بلسم الجسم بالشيا واللوز، زيت تدليك' ),
        'Masque Purifiant Argile Verte' => array( 'en' => 'Green Clay Purifying Mask', 'es' => 'Mascarilla Purificante de Arcilla Verde', 'ar' => 'قناع منقٍ بالطين الأخضر' ),
        'Huile Sèche Botanique, Sérum Éclat à la Rose' => array( 'en' => 'Botanical Dry Oil, Rose Glow Serum', 'es' => 'Aceite Seco Botánico, Sérum Luminosidad de Rosa', 'ar' => 'زيت نباتي جاف، سيروم الإشراقة بالورد' ),
        'Beurre Corporel Coco & Vanille' => array( 'en' => 'Coconut & Vanilla Body Butter', 'es' => 'Manteca Corporal Coco y Vainilla', 'ar' => 'زبدة الجسم بجوز الهند والفانيليا' ),
        'Un univers propre, précis et organisé pour développer des soins cohérents.' => array( 'en' => 'A clean, precise and organised environment to develop coherent products.', 'es' => 'Un universo limpio, preciso y organizado para desarrollar cuidados coherentes.', 'ar' => 'بيئة نظيفة ودقيقة ومنظمة لتطوير منتجات منسجمة.' ),
        'Des actifs naturels sélectionnés pour leur intérêt et leur traçabilité.' => array( 'en' => 'Natural active ingredients selected for their value and traceability.', 'es' => 'Activos naturales seleccionados por su interés y trazabilidad.', 'ar' => 'مكونات فعالة طبيعية مختارة لفائدتها وقابليتها للتتبع.' ),
        'Des contrôles réguliers pour conserver stabilité, texture et sécurité.' => array( 'en' => 'Regular checks to preserve stability, texture and safety.', 'es' => 'Controles regulares para conservar estabilidad, textura y seguridad.', 'ar' => 'فحوصات منتظمة للحفاظ على الثبات والقوام والسلامة.' ),
        'Des contenants élégants, protecteurs et alignés avec l’identité de la marque.' => array( 'en' => 'Elegant, protective containers aligned with the brand identity.', 'es' => 'Envases elegantes, protectores y alineados con la identidad de la marca.', 'ar' => 'عبوات أنيقة وواقية ومتوافقة مع هوية العلامة.' ),
        'Des textures agréables qui transforment le soin en rituel.' => array( 'en' => 'Pleasant textures that turn care into a ritual.', 'es' => 'Texturas agradables que transforman el cuidado en ritual.', 'ar' => 'قوام ممتع يحول العناية إلى طقس.' ),
        'Des bénéfices clairs, des usages simples et une communication transparente.' => array( 'en' => 'Clear benefits, simple uses and transparent communication.', 'es' => 'Beneficios claros, usos sencillos y comunicación transparente.', 'ar' => 'فوائد واضحة واستخدامات بسيطة وتواصل شفاف.' ),
        'Un niveau d’exigence constant du choix des actifs à la livraison.' => array( 'en' => 'A constant level of rigour from active selection to delivery.', 'es' => 'Un nivel de exigencia constante desde la selección de activos hasta la entrega.', 'ar' => 'مستوى ثابت من الصرامة من اختيار المكونات إلى التسليم.' ),
        'Ingrédients d’origine naturelle' => array( 'en' => 'Naturally derived ingredients', 'es' => 'Ingredientes de origen natural', 'ar' => 'مكونات من أصل طبيعي' ),
        'Formules sûres et efficaces' => array( 'en' => 'Safe and effective formulas', 'es' => 'Fórmulas seguras y eficaces', 'ar' => 'تركيبات آمنة وفعالة' ),
        'Sans ingrédients controversés.' => array( 'en' => 'Free from controversial ingredients.', 'es' => 'Sin ingredientes controvertidos.', 'ar' => 'خالٍ من المكونات المثيرة للجدل.' ),
        'Emballages responsables' => array( 'en' => 'Responsible packaging', 'es' => 'Envases responsables', 'ar' => 'عبوات مسؤولة' ),
        'Recyclables ou réutilisables.' => array( 'en' => 'Recyclable or reusable.', 'es' => 'Reciclables o reutilizables.', 'ar' => 'قابلة لإعادة التدوير أو الاستخدام.' ),
        'L’essentiel dans votre boîte' => array( 'en' => 'The essentials in your inbox', 'es' => 'Lo esencial en tu buzón', 'ar' => 'الأساسيات في بريدك' ),
        'Recevez nos nouveautés, conseils beauté et offres exclusives.' => array( 'en' => 'Receive our new arrivals, beauty tips and exclusive offers.', 'es' => 'Recibe nuestras novedades, consejos de belleza y ofertas exclusivas.', 'ar' => 'استقبل مستجداتنا ونصائح الجمال والعروض الحصرية.' ),
        'Veuillez saisir une adresse email valide.' => array( 'en' => 'Please enter a valid email address.', 'es' => 'Introduce una dirección de email válida.', 'ar' => 'يرجى إدخال عنوان بريد إلكتروني صالح.' ),
        'S’inscrire à la newsletter' => array( 'en' => 'Subscribe to the newsletter', 'es' => 'Suscribirse a la newsletter', 'ar' => 'الاشتراك في النشرة' ),
        'Réassurance' => array( 'en' => 'Trust guarantees', 'es' => 'Garantías de confianza', 'ar' => 'ضمانات الثقة' ),
        'Expédition France' => array( 'en' => 'France shipping', 'es' => 'Envío en Francia', 'ar' => 'الشحن داخل فرنسا' ),
        'Service client réactif' => array( 'en' => 'Responsive customer service', 'es' => 'Atención al cliente rápida', 'ar' => 'خدمة عملاء سريعة الاستجابة' ),
        'Programme fidélité : 1 € = 1 point beauté' => array( 'en' => 'Loyalty program: €1 = 1 beauty point', 'es' => 'Programa de fidelidad: 1 € = 1 punto belleza', 'ar' => 'برنامج الولاء: 1 يورو = نقطة جمال واحدة' ),
        'Paiement sécurisé SSL avec les moyens activés dans WooCommerce.' => array( 'en' => 'SSL-secured payment with the methods enabled in WooCommerce.', 'es' => 'Pago seguro SSL con los métodos activados en WooCommerce.', 'ar' => 'دفع مؤمن بتقنية SSL عبر الطرق المفعلة في WooCommerce.' ),
        'Garanties de commande' => array( 'en' => 'Order guarantees', 'es' => 'Garantías del pedido', 'ar' => 'ضمانات الطلب' ),
        'Paiement 100 % sécurisé' => array( 'en' => '100% secure payment', 'es' => 'Pago 100 % seguro', 'ar' => 'دفع آمن 100%' ),
        'Vos données sont protégées et chiffrées (SSL).' => array( 'en' => 'Your data is protected and encrypted (SSL).', 'es' => 'Tus datos están protegidos y cifrados (SSL).', 'ar' => 'بياناتك محمية ومشفرة عبر SSL.' ),
        'Livraison 24–72 h' => array( 'en' => 'Delivery in 24–72h', 'es' => 'Entrega en 24–72 h', 'ar' => 'توصيل خلال 24–72 ساعة' ),
        'Service client disponible' => array( 'en' => 'Customer service available', 'es' => 'Atención al cliente disponible', 'ar' => 'خدمة العملاء متاحة' ),
        'Respect des données personnelles' => array( 'en' => 'Personal data protection', 'es' => 'Respeto de los datos personales', 'ar' => 'احترام البيانات الشخصية' ),
        'Paiement' => array( 'en' => 'Payment', 'es' => 'Pago', 'ar' => 'الدفع' ),
        'Confirmation' => array( 'en' => 'Confirmation', 'es' => 'Confirmación', 'ar' => 'التأكيد' ),
        'Progression livraison offerte' => array( 'en' => 'Free delivery progress', 'es' => 'Progreso envío gratuito', 'ar' => 'تقدم التوصيل المجاني' ),
        'Plus que %s pour bénéficier de la livraison offerte.' => array( 'en' => 'Only %s left to unlock free delivery.', 'es' => 'Solo faltan %s para obtener el envío gratuito.', 'ar' => 'باقي %s فقط للحصول على التوصيل المجاني.' ),
        'Livraison offerte débloquée.' => array( 'en' => 'Free delivery unlocked.', 'es' => 'Envío gratuito desbloqueado.', 'ar' => 'تم تفعيل التوصيل المجاني.' ),
        'Livraison offerte dès 40 € d’achat.' => array( 'en' => 'Free delivery from €40 purchase.', 'es' => 'Envío gratis desde 40 € de compra.', 'ar' => 'توصيل مجاني ابتداء من 40€ من المشتريات.' ),
        'Produits du panier' => array( 'en' => 'Cart products', 'es' => 'Productos del carrito', 'ar' => 'منتجات السلة' ),
        'Soin Cosm’Éthique' => array( 'en' => 'Cosm’Éthique care', 'es' => 'Cuidado Cosm’Éthique', 'ar' => 'عناية كوزم إيثيك' ),
        'Prix unitaire' => array( 'en' => 'Unit price', 'es' => 'Precio unitario', 'ar' => 'سعر الوحدة' ),
        'Diminuer la quantité' => array( 'en' => 'Decrease quantity', 'es' => 'Disminuir cantidad', 'ar' => 'تقليل الكمية' ),
        'Augmenter la quantité' => array( 'en' => 'Increase quantity', 'es' => 'Aumentar cantidad', 'ar' => 'زيادة الكمية' ),
        'Supprimer %s du panier' => array( 'en' => 'Remove %s from cart', 'es' => 'Eliminar %s del carrito', 'ar' => 'إزالة %s من السلة' ),
        'Votre code' => array( 'en' => 'Your code', 'es' => 'Tu código', 'ar' => 'الكود الخاص بك' ),
        'Veuillez saisir un code promotionnel.' => array( 'en' => 'Please enter a promo code.', 'es' => 'Introduce un código promocional.', 'ar' => 'يرجى إدخال رمز ترويجي.' ),
        'Code appliqué, le récapitulatif se met à jour.' => array( 'en' => 'Code applied, the summary is updating.', 'es' => 'Código aplicado, el resumen se está actualizando.', 'ar' => 'تم تطبيق الرمز، يتم تحديث الملخص.' ),
        'Récapitulatif du panier' => array( 'en' => 'Cart summary', 'es' => 'Resumen del carrito', 'ar' => 'ملخص السلة' ),
        'Récapitulatif' => array( 'en' => 'Summary', 'es' => 'Resumen', 'ar' => 'ملخص' ),
        'Calculée au paiement' => array( 'en' => 'Calculated at payment', 'es' => 'Calculado en el pago', 'ar' => 'تحسب عند الدفع' ),
        'Réduction' => array( 'en' => 'Discount', 'es' => 'Descuento', 'ar' => 'الخصم' ),
        'TVA' => array( 'en' => 'VAT', 'es' => 'IVA', 'ar' => 'ضريبة القيمة المضافة' ),
        'Continuer mes achats' => array( 'en' => 'Continue shopping', 'es' => 'Seguir comprando', 'ar' => 'متابعة التسوق' ),
    );
}

function theme_perso_multilingual_product_map() {
    return array(
        'Sérum Éclat à la Rose' => array(
            'en' => array(
                'name'  => 'Rose Glow Serum',
                'short' => 'Hydrates, illuminates and revives radiance with rose and botanical hyaluronic acid.',
                'long'  => '<p>A lightweight radiance serum designed to refresh dull or tired-looking skin without heaviness.</p><p>Rose softens the skin, aloe vera brings immediate comfort, and botanical hyaluronic acid helps preserve suppleness day after day.</p><ul><li>Benefits: hydrates, smooths and boosts glow</li><li>Skin type: all skin types, especially dull skin</li><li>Texture: fresh, fluid and non-sticky</li></ul>',
            ),
            'es' => array(
                'name'  => 'Sérum Luminosidad de Rosa',
                'short' => 'Hidrata, ilumina y despierta la luminosidad con rosa y ácido hialurónico vegetal.',
                'long'  => '<p>Un sérum ligero pensado para reavivar las pieles apagadas sin aportar pesadez.</p><p>La rosa suaviza, el aloe vera aporta confort inmediato y el ácido hialurónico vegetal ayuda a mantener la piel flexible.</p><ul><li>Beneficios: hidrata, alisa e ilumina</li><li>Tipo de piel: todo tipo de pieles, especialmente apagadas</li><li>Textura: fresca, fluida y no pegajosa</li></ul>',
            ),
            'ar' => array(
                'name'  => 'سيروم الإشراقة بالورد',
                'short' => 'يرطب البشرة ويمنحها إشراقاً طبيعياً بفضل الورد وحمض الهيالورونيك النباتي.',
                'long'  => '<p>سيروم خفيف صمم لإنعاش البشرة الباهتة دون أن يثقلها.</p><p>يساعد الورد على تنعيم البشرة، ويمنح الألوفيرا راحة فورية، بينما يحافظ حمض الهيالورونيك النباتي على مرونة البشرة.</p><ul><li>الفوائد: ترطيب، نعومة وإشراقة</li><li>نوع البشرة: كل أنواع البشرة، خاصة الباهتة</li><li>الملمس: سائل، منعش وغير لاصق</li></ul>',
            ),
        ),
        'Crème Hydratante Sauge & Camomille' => array(
            'en' => array(
                'name'  => 'Sage & Chamomile Moisturising Cream',
                'short' => 'A comforting daily cream that hydrates and soothes sensitive skin.',
                'long'  => '<p>A gentle daily moisturiser for skin that needs comfort, hydration and simplicity.</p><p>Sage helps rebalance the skin, while chamomile brings a calming sensation and a supple finish.</p><ul><li>Benefits: hydrates, soothes and protects</li><li>Skin type: normal to sensitive skin</li><li>Texture: fine cream with a soft finish</li></ul>',
            ),
            'es' => array(
                'name'  => 'Crema Hidratante Salvia y Manzanilla',
                'short' => 'Crema diaria confortable que hidrata y calma las pieles sensibles.',
                'long'  => '<p>Una crema suave para pieles que buscan confort, hidratación y sencillez.</p><p>La salvia ayuda a equilibrar la piel y la manzanilla aporta una sensación calmante.</p><ul><li>Beneficios: hidrata, calma y protege</li><li>Tipo de piel: normal a sensible</li><li>Textura: crema fina de acabado suave</li></ul>',
            ),
            'ar' => array(
                'name'  => 'كريم مرطب بالمريمية والبابونج',
                'short' => 'كريم يومي مريح يرطب البشرة الحساسة ويهدئها.',
                'long'  => '<p>كريم يومي لطيف للبشرة التي تحتاج إلى الراحة والترطيب والبساطة.</p><p>تساعد المريمية على توازن البشرة، بينما يمنح البابونج إحساساً مهدئاً ولمسة ناعمة.</p><ul><li>الفوائد: يرطب، يهدئ ويحمي</li><li>نوع البشرة: العادية إلى الحساسة</li><li>الملمس: كريم ناعم بلمسة مريحة</li></ul>',
            ),
        ),
        'Baume Corps Karité & Amande' => array(
            'en' => array(
                'name'  => 'Shea & Almond Body Balm',
                'short' => 'Deeply nourishes dry skin and restores lasting comfort.',
                'long'  => '<p>A generous balm for dry areas such as legs, elbows, knees and hands.</p><p>Shea butter deeply nourishes, sweet almond comforts the skin, and the rich texture melts into a protective finish.</p><ul><li>Benefits: nourishes, repairs and protects</li><li>Skin type: dry to very dry skin</li><li>Texture: rich melting balm</li></ul>',
            ),
            'es' => array(
                'name'  => 'Bálsamo Corporal Karité y Almendra',
                'short' => 'Nutre intensamente las pieles secas y devuelve confort duradero.',
                'long'  => '<p>Un bálsamo generoso para zonas secas como piernas, codos, rodillas y manos.</p><p>El karité nutre intensamente, la almendra dulce calma y la textura rica deja un acabado protector.</p><ul><li>Beneficios: nutre, repara y protege</li><li>Tipo de piel: seca a muy seca</li><li>Textura: bálsamo rico y fundente</li></ul>',
            ),
            'ar' => array(
                'name'  => 'بلسم الجسم بزبدة الشيا واللوز',
                'short' => 'يغذي البشرة الجافة بعمق ويعيد إليها الراحة.',
                'long'  => '<p>بلسم غني للمناطق الجافة مثل الساقين والمرفقين والركبتين واليدين.</p><p>تغذي زبدة الشيا بعمق، ويمنح اللوز الحلو راحة للبشرة، بينما يترك القوام الغني طبقة واقية.</p><ul><li>الفوائد: تغذية، إصلاح وحماية</li><li>نوع البشرة: الجافة إلى الجافة جداً</li><li>الملمس: بلسم غني يذوب على البشرة</li></ul>',
            ),
        ),
        'Huile Sèche Botanique' => array(
            'en' => array(
                'name'  => 'Botanical Dry Oil',
                'short' => 'Nourishes, satins and enhances skin without a greasy finish.',
                'long'  => '<p>A fine botanical dry oil that leaves skin soft, luminous and comfortable.</p><p>Precious plant oils nourish the skin while preserving a light, non-greasy touch.</p>',
            ),
            'es' => array(
                'name'  => 'Aceite Seco Botánico',
                'short' => 'Nutre, satina y realza la piel sin acabado graso.',
                'long'  => '<p>Un aceite seco botánico fino que deja la piel suave, luminosa y confortable.</p><p>Los aceites vegetales preciosos nutren sin aportar sensación grasa.</p>',
            ),
            'ar' => array(
                'name'  => 'زيت نباتي جاف',
                'short' => 'يغذي البشرة ويمنحها لمسة ساتانية دون أثر دهني.',
                'long'  => '<p>زيت نباتي جاف وخفيف يترك البشرة ناعمة ومضيئة ومريحة.</p><p>تغذي الزيوت النباتية الثمينة البشرة مع الحفاظ على ملمس غير دهني.</p>',
            ),
        ),
        'Masque Cheveux Réparateur' => array(
            'en' => array(
                'name'  => 'Repairing Hair Mask',
                'short' => 'Repairs lengths and intensely nourishes the hair fibre.',
                'long'  => '<p>A creamy repairing mask for dry, damaged or hard-to-detangle hair.</p><p>It wraps the hair fibre in nourishing comfort and leaves lengths softer, smoother and brighter.</p>',
            ),
            'es' => array(
                'name'  => 'Mascarilla Capilar Reparadora',
                'short' => 'Repara los largos y nutre intensamente la fibra capilar.',
                'long'  => '<p>Mascarilla cremosa para cabello seco, sensibilizado o difícil de desenredar.</p><p>Envuelve la fibra capilar con nutrición y deja el cabello más suave y luminoso.</p>',
            ),
            'ar' => array(
                'name'  => 'ماسك إصلاح الشعر',
                'short' => 'يرمم الأطوال ويغذي ألياف الشعر بعمق.',
                'long'  => '<p>ماسك كريمي للشعر الجاف أو المتضرر أو صعب التمشيط.</p><p>يغلف ألياف الشعر بتغذية مريحة ويتركه أكثر نعومة ولمعاناً.</p>',
            ),
        ),
        'Shampooing Doux Sauge & Ortie' => array(
            'en' => array(
                'name'  => 'Gentle Sage & Nettle Shampoo',
                'short' => 'Gently cleanses hair while respecting the scalp.',
                'long'  => '<p>A gentle shampoo that cleanses without stripping and leaves lengths light.</p><p>Sage helps rebalance the scalp, while nettle is valued in natural hair care rituals.</p>',
            ),
            'es' => array(
                'name'  => 'Champú Suave Salvia y Ortiga',
                'short' => 'Limpia suavemente el cabello respetando el cuero cabelludo.',
                'long'  => '<p>Champú suave que limpia sin agredir y deja el cabello ligero.</p><p>La salvia ayuda a equilibrar el cuero cabelludo y la ortiga es apreciada en los rituales capilares naturales.</p>',
            ),
            'ar' => array(
                'name'  => 'شامبو لطيف بالمريمية والقراص',
                'short' => 'ينظف الشعر بلطف مع احترام فروة الرأس.',
                'long'  => '<p>شامبو لطيف ينظف دون أن يسبب الجفاف ويترك الشعر خفيفاً.</p><p>تساعد المريمية على توازن فروة الرأس، ويعد القراص مكوناً محبوباً في العناية الطبيعية بالشعر.</p>',
            ),
        ),
    );
}

function theme_perso_multilingual_product_names() {
    return array(
        'Gel Nettoyant Aloe Vera' => array( 'en' => 'Aloe Vera Cleansing Gel', 'es' => 'Gel Limpiador Aloe Vera', 'ar' => 'جل منظف بالألوفيرا' ),
        'Lotion Tonique Fleur d’Oranger' => array( 'en' => 'Orange Blossom Toning Lotion', 'es' => 'Loción Tónica Flor de Azahar', 'ar' => 'لوشن منشط بزهر البرتقال' ),
        'Masque Purifiant Argile Verte' => array( 'en' => 'Green Clay Purifying Mask', 'es' => 'Mascarilla Purificante Arcilla Verde', 'ar' => 'ماسك منقي بالطين الأخضر' ),
        'Huile de Soin Nourrissante' => array( 'en' => 'Nourishing Face Oil', 'es' => 'Aceite Nutritivo Facial', 'ar' => 'زيت عناية مغذ للوجه' ),
        'Masque Nutrition Intense' => array( 'en' => 'Intense Nutrition Mask', 'es' => 'Mascarilla Nutrición Intensa', 'ar' => 'ماسك تغذية مكثفة' ),
        'Huile Essentielle Lavande Fine' => array( 'en' => 'Fine Lavender Essential Oil', 'es' => 'Aceite Esencial de Lavanda Fina', 'ar' => 'زيت اللافندر العطري الناعم' ),
        'Gommage Corps Sucre & Lavande' => array( 'en' => 'Sugar & Lavender Body Scrub', 'es' => 'Exfoliante Corporal Azúcar y Lavanda', 'ar' => 'مقشر الجسم بالسكر واللافندر' ),
        'Lait Corps Hydratant' => array( 'en' => 'Hydrating Body Milk', 'es' => 'Leche Corporal Hidratante', 'ar' => 'حليب جسم مرطب' ),
        'Beurre Corporel Coco & Vanille' => array( 'en' => 'Coconut & Vanilla Body Butter', 'es' => 'Manteca Corporal Coco y Vainilla', 'ar' => 'زبدة جسم بجوز الهند والفانيليا' ),
        'Gel Douche Coton & Avoine' => array( 'en' => 'Cotton & Oat Shower Gel', 'es' => 'Gel de Ducha Algodón y Avena', 'ar' => 'جل استحمام بالقطن والشوفان' ),
        'Huile Capillaire Botanique' => array( 'en' => 'Botanical Hair Oil', 'es' => 'Aceite Capilar Botánico', 'ar' => 'زيت شعر نباتي' ),
        'Après-Shampooing Aloe Vera & Karité' => array( 'en' => 'Aloe Vera & Shea Conditioner', 'es' => 'Acondicionador Aloe Vera y Karité', 'ar' => 'بلسم بالألوفيرا والشيا' ),
        'Sérum Pointes Nourrissant' => array( 'en' => 'Nourishing Ends Serum', 'es' => 'Sérum Nutritivo para Puntas', 'ar' => 'سيروم مغذ للأطراف' ),
        'Spray Protecteur Thermique' => array( 'en' => 'Heat Protection Spray', 'es' => 'Spray Protector Térmico', 'ar' => 'بخاخ حماية حرارية' ),
        'Éponge Konjac Naturelle' => array( 'en' => 'Natural Konjac Sponge', 'es' => 'Esponja Konjac Natural', 'ar' => 'إسفنجة كونجاك طبيعية' ),
        'Brosse Cheveux Bambou' => array( 'en' => 'Bamboo Hair Brush', 'es' => 'Cepillo de Bambú', 'ar' => 'فرشاة شعر من الخيزران' ),
        'Gua Sha Quartz Rose' => array( 'en' => 'Rose Quartz Gua Sha', 'es' => 'Gua Sha de Cuarzo Rosa', 'ar' => 'غوا شا كوارتز وردي' ),
        'Roller Jade Naturel' => array( 'en' => 'Natural Jade Roller', 'es' => 'Roller de Jade Natural', 'ar' => 'رولر جايد طبيعي' ),
        'Trousse Beauté Cosm’Éthique' => array( 'en' => 'Cosm’Éthique Beauty Pouch', 'es' => 'Neceser Cosm’Éthique', 'ar' => 'حقيبة جمال كوزم إيثيك' ),
        'Set Premium Gua Sha + Roller' => array( 'en' => 'Premium Gua Sha + Roller Set', 'es' => 'Set Premium Gua Sha + Roller', 'ar' => 'طقم فاخر غوا شا + رولر' ),
        'Pack Routine Visage' => array( 'en' => 'Face Routine Set', 'es' => 'Pack Rutina Facial', 'ar' => 'مجموعة روتين الوجه' ),
        'Pack Routine Corps' => array( 'en' => 'Body Routine Set', 'es' => 'Pack Rutina Corporal', 'ar' => 'مجموعة روتين الجسم' ),
        'Pack Routine Cheveux' => array( 'en' => 'Hair Routine Set', 'es' => 'Pack Rutina Capilar', 'ar' => 'مجموعة روتين الشعر' ),
        'Pack Routine Premium' => array( 'en' => 'Premium Routine Set', 'es' => 'Pack Rutina Premium', 'ar' => 'مجموعة الروتين الفاخرة' ),
    );
}

function theme_perso_multilingual_translate( $text, $language = null ) {
    if ( '' === $text || null === $text ) {
        return $text;
    }

    $language = $language ? theme_perso_normalize_language_code( $language ) : theme_perso_current_language();

    if ( 'fr' === $language ) {
        return $text;
    }

    $map = theme_perso_multilingual_text_map();

    if ( isset( $map[ $text ][ $language ] ) ) {
        return $map[ $text ][ $language ];
    }

    $products = theme_perso_multilingual_product_map();
    if ( isset( $products[ $text ][ $language ]['name'] ) ) {
        return $products[ $text ][ $language ]['name'];
    }

    $product_names = theme_perso_multilingual_product_names();
    if ( isset( $product_names[ $text ][ $language ] ) ) {
        return $product_names[ $text ][ $language ];
    }

    return $text;
}

function theme_perso_multilingual_get_product_source_title( $product ) {
    if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
        return '';
    }

    $post = get_post( $product->get_id() );

    return $post ? $post->post_title : '';
}

function theme_perso_multilingual_generic_product_copy( $source, $type = 'short' ) {
    $language = theme_perso_current_language();
    $name     = theme_perso_multilingual_translate( $source, $language );

    if ( 'fr' === $language ) {
        return '';
    }

    $copy = array(
        'en' => array(
            'short' => sprintf( '%s is part of the Cosm’Éthique natural care collection, designed for an elegant, effective and responsible routine.', $name ),
            'long'  => sprintf( '<p>%s is a premium Cosm’Éthique care essential created to support a natural, sensorial and responsible beauty routine.</p><p>Its formula and ritual are designed to bring comfort, softness and visible results while respecting the brand’s minimalist, natural approach.</p><ul><li>Benefits: comfort, softness and radiance</li><li>Use: apply as part of your daily or weekly routine according to your needs</li><li>Result: a more refined, consistent and enjoyable beauty ritual</li></ul>', $name ),
        ),
        'es' => array(
            'short' => sprintf( '%s forma parte de la colección natural Cosm’Éthique, pensada para una rutina elegante, eficaz y responsable.', $name ),
            'long'  => sprintf( '<p>%s es un esencial premium Cosm’Éthique creado para acompañar una rutina de belleza natural, sensorial y responsable.</p><p>Su fórmula y su ritual aportan confort, suavidad y resultados visibles respetando el enfoque minimalista y natural de la marca.</p><ul><li>Beneficios: confort, suavidad y luminosidad</li><li>Uso: aplicar en la rutina diaria o semanal según las necesidades</li><li>Resultado: un ritual de belleza más refinado, coherente y agradable</li></ul>', $name ),
        ),
        'ar' => array(
            'short' => sprintf( '%s جزء من مجموعة كوزم إيثيك الطبيعية المصممة لروتين أنيق وفعال ومسؤول.', $name ),
            'long'  => sprintf( '<p>%s منتج فاخر من كوزم إيثيك صمم لدعم روتين جمال طبيعي وحسي ومسؤول.</p><p>تم تصميم تركيبته وطريقة استخدامه لمنح الراحة والنعومة ونتائج واضحة مع احترام هوية العلامة الطبيعية والبسيطة.</p><ul><li>الفوائد: راحة، نعومة وإشراقة</li><li>الاستخدام: يطبق ضمن الروتين اليومي أو الأسبوعي حسب الحاجة</li><li>النتيجة: روتين جمال أكثر تناسقاً وأناقة ومتعة</li></ul>', $name ),
        ),
    );

    return isset( $copy[ $language ][ $type ] ) ? $copy[ $language ][ $type ] : '';
}

function theme_perso_multilingual_product_name( $name, $product ) {
    if ( ! theme_perso_multilingual_is_active() ) {
        return $name;
    }

    $source = theme_perso_multilingual_get_product_source_title( $product );

    return $source ? theme_perso_multilingual_translate( $source ) : theme_perso_multilingual_translate( $name );
}
add_filter( 'woocommerce_product_get_name', 'theme_perso_multilingual_product_name', 20, 2 );
add_filter( 'woocommerce_product_variation_get_name', 'theme_perso_multilingual_product_name', 20, 2 );

function theme_perso_multilingual_product_short_description( $description, $product ) {
    if ( ! theme_perso_multilingual_is_active() ) {
        return $description;
    }

    $source   = theme_perso_multilingual_get_product_source_title( $product );
    $language = theme_perso_current_language();
    $products = theme_perso_multilingual_product_map();

    if ( isset( $products[ $source ][ $language ]['short'] ) ) {
        return $products[ $source ][ $language ]['short'];
    }

    $fallback = theme_perso_multilingual_generic_product_copy( $source, 'short' );

    return $fallback ? $fallback : theme_perso_multilingual_translate_html( $description );
}
add_filter( 'woocommerce_product_get_short_description', 'theme_perso_multilingual_product_short_description', 20, 2 );

function theme_perso_multilingual_product_description( $description, $product ) {
    if ( ! theme_perso_multilingual_is_active() ) {
        return $description;
    }

    $source   = theme_perso_multilingual_get_product_source_title( $product );
    $language = theme_perso_current_language();
    $products = theme_perso_multilingual_product_map();

    if ( isset( $products[ $source ][ $language ]['long'] ) ) {
        return wp_kses_post( $products[ $source ][ $language ]['long'] );
    }

    $fallback = theme_perso_multilingual_generic_product_copy( $source, 'long' );

    return $fallback ? wp_kses_post( $fallback ) : theme_perso_multilingual_translate_html( $description );
}
add_filter( 'woocommerce_product_get_description', 'theme_perso_multilingual_product_description', 20, 2 );

function theme_perso_multilingual_title( $title, $post_id = 0 ) {
    if ( is_admin() || ! theme_perso_multilingual_is_active() || ! $post_id ) {
        return $title;
    }

    $post_type = get_post_type( $post_id );

    if ( in_array( $post_type, array( 'product', 'post', 'page' ), true ) ) {
        return theme_perso_multilingual_translate( $title );
    }

    return $title;
}
add_filter( 'the_title', 'theme_perso_multilingual_title', 20, 2 );

function theme_perso_multilingual_term( $term ) {
    if ( is_admin() || ! theme_perso_multilingual_is_active() || ! $term || is_wp_error( $term ) ) {
        return $term;
    }

    $term_map = array(
        'soins-visage'       => array( 'en' => array( 'Face care', 'Natural care to hydrate, protect and reveal skin radiance.' ), 'es' => array( 'Cuidado facial', 'Cuidados naturales para hidratar, proteger y revelar la luminosidad de la piel.' ), 'ar' => array( 'العناية بالوجه', 'عناية طبيعية لترطيب البشرة وحمايتها وإبراز إشراقتها.' ) ),
        'soins-corps'        => array( 'en' => array( 'Body care', 'Natural body care to nourish, hydrate and enhance the skin.' ), 'es' => array( 'Cuidado corporal', 'Cuidados corporales naturales para nutrir, hidratar y sublimar la piel.' ), 'ar' => array( 'العناية بالجسم', 'عناية طبيعية بالجسم للتغذية والترطيب وإبراز جمال البشرة.' ) ),
        'soins-cheveux'      => array( 'en' => array( 'Hair care', 'Natural hair care to nourish, repair and enhance your hair.' ), 'es' => array( 'Cuidado capilar', 'Cuidados capilares naturales para nutrir, reparar y sublimar el cabello.' ), 'ar' => array( 'العناية بالشعر', 'عناية طبيعية بالشعر للتغذية والإصلاح والإشراق.' ) ),
        'accessoires-beaute' => array( 'en' => array( 'Beauty accessories', 'Premium accessories to complete your beauty routine.' ), 'es' => array( 'Accesorios de belleza', 'Accesorios premium para completar tu rutina de belleza.' ), 'ar' => array( 'إكسسوارات الجمال', 'إكسسوارات فاخرة لإكمال روتين الجمال.' ) ),
        'packs'              => array( 'en' => array( 'Sets', 'Ready-to-use Cosm’Éthique routines for face, body and hair.' ), 'es' => array( 'Packs', 'Rutinas Cosm’Éthique listas para rostro, cuerpo y cabello.' ), 'ar' => array( 'المجموعات', 'روتينات كوزم إيثيك جاهزة للوجه والجسم والشعر.' ) ),
    );

    $language = theme_perso_current_language();

    if ( isset( $term_map[ $term->slug ][ $language ] ) ) {
        $term->name        = $term_map[ $term->slug ][ $language ][0];
        $term->description = $term_map[ $term->slug ][ $language ][1];
    }

    return $term;
}
add_filter( 'get_term', 'theme_perso_multilingual_term', 20 );

function theme_perso_multilingual_gettext( $translated, $text ) {
    if ( ! theme_perso_multilingual_is_active() ) {
        return $translated;
    }

    return theme_perso_multilingual_translate( $translated );
}
add_filter( 'gettext', 'theme_perso_multilingual_gettext', 20, 2 );
add_filter( 'gettext_with_context', 'theme_perso_multilingual_gettext', 20, 2 );

function theme_perso_multilingual_ngettext( $translation ) {
    if ( ! theme_perso_multilingual_is_active() ) {
        return $translation;
    }

    return theme_perso_multilingual_translate( $translation );
}
add_filter( 'ngettext', 'theme_perso_multilingual_ngettext', 20, 5 );
add_filter( 'ngettext_with_context', 'theme_perso_multilingual_ngettext', 20, 6 );

function theme_perso_multilingual_translate_html( $html ) {
    if ( ! theme_perso_multilingual_is_active() || '' === $html ) {
        return $html;
    }

    $language     = theme_perso_current_language();
    $replacements = array();

    foreach ( theme_perso_multilingual_text_map() as $source => $translations ) {
        if ( isset( $translations[ $language ] ) ) {
            $replacements[ $source ] = $translations[ $language ];
        }
    }

    foreach ( theme_perso_multilingual_product_map() as $source => $translations ) {
        if ( isset( $translations[ $language ]['name'] ) ) {
            $replacements[ $source ] = $translations[ $language ]['name'];
        }
    }

    foreach ( theme_perso_multilingual_product_names() as $source => $translations ) {
        if ( isset( $translations[ $language ] ) ) {
            $replacements[ $source ] = $translations[ $language ];
        }
    }

    uksort(
        $replacements,
        static function ( $a, $b ) {
            return strlen( $b ) <=> strlen( $a );
        }
    );

    return strtr( $html, $replacements );
}

function theme_perso_multilingual_start_buffer() {
    if ( ! is_admin() && theme_perso_multilingual_is_active() ) {
        ob_start( 'theme_perso_multilingual_translate_html' );
    }
}
add_action( 'template_redirect', 'theme_perso_multilingual_start_buffer', 1 );

function theme_perso_multilingual_script_data() {
    $hours = array(
        'fr' => 'Lun-Sam 10h-19h',
        'en' => theme_perso_multilingual_translate( 'Lun-Sam 10h-19h', 'en' ),
        'es' => theme_perso_multilingual_translate( 'Lun-Sam 10h-19h', 'es' ),
        'ar' => theme_perso_multilingual_translate( 'Lun-Sam 10h-19h', 'ar' ),
    );

    return array(
        'lang' => theme_perso_current_language(),
        'dir'  => 'ar' === theme_perso_current_language() ? 'rtl' : 'ltr',
        'ui'   => array(
            'newsletterConfirmed' => theme_perso_multilingual_translate( 'Inscription confirmée' ),
            'newsletterError'     => theme_perso_multilingual_translate( 'Veuillez saisir une adresse email valide.' ),
            'copied'              => theme_perso_multilingual_translate( 'Copié' ),
            'linkCopied'          => theme_perso_multilingual_translate( 'Lien copié' ),
            'lightboxLabel'       => theme_perso_multilingual_translate( 'Image produit agrandie' ),
            'close'               => theme_perso_multilingual_translate( 'Fermer' ),
            'previousImage'       => theme_perso_multilingual_translate( 'Image précédente' ),
            'nextImage'           => theme_perso_multilingual_translate( 'Image suivante' ),
            'couponEmpty'         => theme_perso_multilingual_translate( 'Veuillez saisir un code promotionnel.' ),
            'couponApplied'       => theme_perso_multilingual_translate( 'Code appliqué, le récapitulatif se met à jour.' ),
        ),
        'diagnostic' => array(
            'step'            => theme_perso_multilingual_translate( 'Étape %1$d / %2$d' ),
            'continue'        => theme_perso_multilingual_translate( 'Continuer' ),
            'viewRoutine'     => theme_perso_multilingual_translate( 'Voir ma routine' ),
            'result'          => theme_perso_multilingual_translate( 'Résultat' ),
            'morning'         => theme_perso_multilingual_translate( 'Matin' ),
            'evening'         => theme_perso_multilingual_translate( 'Soir' ),
            'viewProduct'     => theme_perso_multilingual_translate( 'Voir le produit' ),
            'addToCart'       => theme_perso_multilingual_translate( 'Ajouter au panier' ),
            'skin'            => array(
                'dry'       => theme_perso_multilingual_translate( 'sèche' ),
                'mixed'     => theme_perso_multilingual_translate( 'mixte' ),
                'oily'      => theme_perso_multilingual_translate( 'grasse' ),
                'sensitive' => theme_perso_multilingual_translate( 'sensible' ),
                'balanced'  => theme_perso_multilingual_translate( 'équilibrée' ),
            ),
            'goal'            => array(
                'hydrate'       => theme_perso_multilingual_translate( 'd’hydratation' ),
                'glow'          => theme_perso_multilingual_translate( 'd’éclat' ),
                'imperfections' => theme_perso_multilingual_translate( 'anti-imperfections' ),
                'age'           => theme_perso_multilingual_translate( 'anti-âge' ),
                'soothe'        => theme_perso_multilingual_translate( 'd’apaisement' ),
                'naturalBeauty' => theme_perso_multilingual_translate( 'beauté naturelle' ),
            ),
            'complete'        => theme_perso_multilingual_translate( 'complet' ),
            'essential'       => theme_perso_multilingual_translate( 'essentiel' ),
            'explanation'     => theme_perso_multilingual_translate( 'Cette routine répond à une peau %1$s avec un objectif %2$s. Les textures sélectionnées respectent votre préférence et composent un rituel %3$s, facile à adopter au quotidien.' ),
        ),
        'map'  => array(
            'viewStore'            => theme_perso_multilingual_translate( 'Voir la boutique' ),
            'mondaySaturdayHours'  => $hours,
        ),
    );
}
