<?php
declare(strict_types=1);
namespace Towny\ui;

use pocketmine\player\Player;
use Towny\TownyLoader;

abstract class UI{

	private static $formIds = [];

	private static $plugin;

	public static $uiMessage = "towny.ui.";

	public static $message = "towny.message.";

	public static function init(){
		self::$plugin = TownyLoader::getInstance();

		self::$formIds[CreateUI::getFormId()] = new CreateUI();
	}

	final public static function getPlugin() : TownyLoader{
		return self::$plugin ?? self::$plugin = TownyLoader::getInstance();
	}

	final public static function getFormById(int $id) : ?UI{
		return self::$formIds[$id] ?? null;
	}

	abstract public static function getFormId() : int;

	abstract public static function sendToPlayer(Player $player) : void;

	abstract public function handleResponse(Player $player, $data) : void;
}