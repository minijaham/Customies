<?php
declare(strict_types=1);

namespace customiesdevs\customies\item\component;

final class RenderOffsetsComponent implements ItemComponent {

	private int $textureWidth;
	private int $textureHeight;
	private bool $handEquipped;

	// public function __construct(int $textureSize) {
	// 	$this->textureSize = $textureSize;
	// }

	public function __construct(int $textureWidth, int $textureHeight, bool $handEquipped = false) {
		$this->textureWidth = $textureWidth;
		$this->textureHeight = $textureHeight;
		$this->handEquipped = $handEquipped;
	}

	public function getName(): string {
		return "minecraft:render_offsets";
	}

	public function getValue(): array {
		// $textureSize   = $this->textureSize;
		// $mainHandFirst = round(0.039 * 16 / $textureSize, 8);
		// $offHandFirst  = round(0.065 * 16 / $textureSize, 8);
		// $mainHandThird = $offHandThird = round(0.0965 * 16 / $textureSize, 8);

		// return [
		// 	"main_hand" => [
		// 		"first_person" => [
		// 			"scale" => [$mainHandFirst, $mainHandFirst, $mainHandFirst],
		// 		],
		// 		"third_person" => [
		// 			"scale" => [$mainHandThird, $mainHandThird, $mainHandThird]
		// 		]
		// 	],
		// 	"off_hand" => [
		// 		"first_person" => [
		// 			"scale" => [$offHandFirst, $offHandFirst, $offHandFirst],
		// 		],
		// 		"third_person" => [
		// 			"scale" => [$offHandThird, $offHandThird, $offHandThird]
		// 		]
		// 	]
		// ];

		$horizontal = ($this->handEquipped ? 0.075 : 0.1) / ($this->textureWidth / 16);
		$vertical = ($this->handEquipped ? 0.125 : 0.1) / ($this->textureHeight / 16);
		$perspectives = [
			"first_person" => [
				"scale" => [$horizontal, $vertical, $horizontal],
			],
			"third_person" => [
				"scale" => [$horizontal, $vertical, $horizontal]
			]
		];
		return [
			"main_hand" => $perspectives,
			"off_hand" => $perspectives
		];
	}

	public function isProperty(): bool {
		return false;
	}
}