<?php

  namespace WarnPlayer;

  use pocketmine\plugin\PluginBase;
  use pocketmine\event\Listener;
  use pocketmine\utils\TextFormat as TF;
  use pocketmine\Player;
  use pocketmine\command\Command;
  use pocketmine\command\CommandSender;
  use pocketmine\command\ConsoleCommandSender;

  class Main extends PluginBase implements Listener {
    public function dataPath() {
      return $this->getDataFolder();
    }

    public function onEnable() {
      $this->getServer()->getPluginManager()->registerEvents($this, $this);




    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
      if(strtolower($cmd->getName()) === "warn") {
        if(!(isset($args[0]) and isset($args[1]))) {
          return true;
        } else {
          $sender_name = $sender->getName();
          $name = $args[0];
          $player = $this->getServer()->getPlayer($name);
          if($player === null) {
            $sender->sendMessage(TF::RED . "Player " . $name . " could not be found.");
            return true;
            unset($args[0]);
            $reason = implode(" ", $args);
          }
        }
      }
    }
  }
