<?php
function outputFAQSchema($faqs) {
    if (empty($faqs)) return;
    ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            <?php foreach ($faqs as $index => $faq): ?>
            {
                "@type": "Question",
                "name": "<?php echo htmlspecialchars($faq['question']); ?>",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "<?php echo htmlspecialchars($faq['answer']); ?>"
                }
            }<?php echo ($index < count($faqs) - 1) ? ',' : ''; ?>
            <?php endforeach; ?>
        ]
    }
    </script>
    <?php
}