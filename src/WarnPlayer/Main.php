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
      if(!(file_exists($this->dataPath()))) {
        @mkdir($this->dataPath());
        chdir($this->dataPath());
        @mkdir("Players/", 0777, true);
      }
    }

    public function Warns(Player $player, Player $sender , $reason){

      $player_name = $player->getName();
      $file = file_get_contents($this->dataPath() . "Players/" . strtolower($player_name) . ".txt");
      file_put_contents($this->dataPath() . "Players/" . strtolower($player_name) . ".txt", $file + 1);

      if(!(file_exists($this->dataPath() . "Players/" . strtolower($player_name) . ".txt"))) {
        touch($this->dataPath() . "Players/" . strtolower($player_name) . ".txt");
        file_put_contents($this->dataPath() . "Players/" . strtolower($player_name) . ".txt", "0");
      }

      if($file === "2") {
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 1 10 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 2 10 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 3 10 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 4 10 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 5 10 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 6 10 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 7 10 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 8 10 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 9 10 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 10 10 " . $reason);

        $player->sendMessage(TF::RED . "You are Jailed for " . $reason . " by a Moderator");
        $player->sendMessage(TF::RED . "10 min left");
        $sender->sendMessage(TF::GREEN . "" . $player_name . " has been Jailed for 10 min!");

      }

      if($file === "3") {
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 1 60 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 2 60 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 3 60 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 4 60 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 5 60 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 6 60 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 7 60 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 8 60 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 9 60 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 10 60 " . $reason);

        $player->sendMessage(TF::RED . "You are Jailed for " . $reason . " by a Moderator");
        $player->sendMessage(TF::RED . "1 hour left");
        $sender->sendMessage(TF::GREEN . "" . $player_name . " has been Jailed for 1 hour!");

      }

      if($file === "4") {
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 1 1440 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 2 1440 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 3 1440 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 4 1440 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 5 1440 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 6 1440 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 7 1440 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 8 1440 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 9 1440 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"jail " . $player_name . " 10 1440 " . $reason);

        $player->sendMessage(TF::RED . "You are Jailed for " . $reason . " by a Moderator");
        $player->sendMessage(TF::RED . "1 day left");
        $sender->sendMessage(TF::GREEN . "" . $player_name . " has been Jailed for 1 day!");

      }

      if($file >= "5") {
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "jail " . $player_name . " 1 10080 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "jail " . $player_name . " 2 10080 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "jail " . $player_name . " 3 10080 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "jail " . $player_name . " 4 10080 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "jail " . $player_name . " 5 10080 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "jail " . $player_name . " 6 10080 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "jail " . $player_name . " 7 10080 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "jail " . $player_name . " 8 10080 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "jail " . $player_name . " 9 10080 " . $reason);
        $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "jail " . $player_name . " 10 10080 " . $reason);

        $player->sendMessage(TF::RED . "You are Jailed for " . $reason . " by a Moderator");
        $player->sendMessage(TF::RED . "1 week left");
        $sender->sendMessage(TF::GREEN . "" . $player_name . " has been Jailed for 1 week!");

      }else{
        $player->kick(TextFormat::YELLOW . "You are warned for " . $reason . " by a Moderator", false);
        $sender->sendMessage(TF::GREEN . $player_name . " has been warned!");
        return true;
      }
    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
      if(strtolower($cmd->getName()) === "report") {
        if(!(isset($args[0]))) {
          $sender->sendMessage(TF::RED . "Error: not enough args. Usage: /report <player>");
          return true;
        }else{
          $sender_name = $sender->getName();
          $sender_display_name = $sender->getDisplayName();
          $name = $args[0];
          $player = $this->getServer()->getPlayer($name);
          if($player === null) {
            $sender->sendMessage(TF::RED . "Player " . $name . " could not be found.");
            return true;
          }else{
            foreach($this->getServer()->getOnlinePlayers() as $p) {
              if($p->hasPermission(rank.moderator)) {
                $p->sendMessage(TF::YELLOW . $sender_name . " reported " . $name . " for using hacks/mods!");
              }
            }
            $player->sendMessage(TF::YELLOW . "You are reported for using hacks/mods!");
            $sender->sendMessage(TF::GREEN . $name . " has been reported!");
            return true;
          }
        }
      }
      if(strtolower($cmd->getName()) === "warn") {
        if(!(isset($args[0]) and isset($args[1]))) {
          $sender->sendMessage(TF::RED . "Error: not enough args. Usage: /warn <player> <reason>");
          return true;
        } else {
          $sender_name = $sender->getName();
          $name = $args[0];
          $player = $this->getServer()->getPlayer($name);
          if($player === null) {
            $sender->sendMessage(TF::RED . "Player " . $name . " could not be found.");
            return true;
          }else{
            unset($args[0]);
            $reason = implode(" ", $args);
            $this->Warns($player, $sender, $reason);
          }
        }
      }
    }
  }
