<?php $category = $component->getServiceListCategory($arParams['element_id']) ?>

<?php if ($category): ?>
	<div class="container">
		<h3>Категории</h3>
		<ul>
			<?php foreach ($category as $value): ?>
				<li>
					<a href="/service/?category=<?= $value['id'] ?>">
						<?= $value['name'] ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>
