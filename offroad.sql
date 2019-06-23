

-- -----------------------------------------------------
-- Table `offroad2`.`promoter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroad2`.`promoter` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `proNome` VARCHAR(45) NULL,
  `proCpf` INT(11) NULL,
  `proNumCel` VARCHAR(45) NULL,
  `proEmail` VARCHAR(45) NULL,
  `proTamCamisa` VARCHAR(45) NULL,
  `proSenha` VARCHAR(45) NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE INDEX `idUsuario_UNIQUE` (`idUsuario` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `offroad2`.`Evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroad2`.`Evento` (
  `idEventos` INT(11) NOT NULL AUTO_INCREMENT,
  `evenNome` VARCHAR(45) NULL,
  `evenData` DATE NULL,
  `evenHoraInicial` TIME NULL,
  `evenHoraFinal` TIME NULL,
  `evenDescr` VARCHAR(45) NULL,
  `evenTipoTrilha` VARCHAR(45) NULL,
  `evenVlrInscri` FLOAT NULL,
  `evenStatusDel` VARCHAR(45) NULL,
  `evenVlrAtualizadol` FLOAT NULL,
  `promoter_idUsuario` INT(11) NOT NULL,
  `evenJustifica` VARCHAR(255) NULL,
  PRIMARY KEY (`idEventos`, `promoter_idUsuario`),
  UNIQUE INDEX `idEventos_UNIQUE` (`idEventos` ASC) ,
  INDEX `fk_Evento_promoter1_idx` (`promoter_idUsuario` ASC) ,
  CONSTRAINT `fk_Evento_promoter1`
    FOREIGN KEY (`promoter_idUsuario`)
    REFERENCES `offroad2`.`promoter` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `offroad2`.`Endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroad2`.`Endereco` (
  `idEndereco` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `eveRua` VARCHAR(45) NULL,
  `eveBairro` VARCHAR(45) NULL,
  `eveLatitude` DOUBLE(10,6) NULL,
  `eveLongitude` DOUBLE(10,6) NULL,
  `Evento_idEventos` INT(11) NOT NULL,
  PRIMARY KEY (`idEndereco`, `Evento_idEventos`),
  UNIQUE INDEX `idEndereco_UNIQUE` (`idEndereco` ASC) ,
  INDEX `fk_Endereco_Evento1_idx` (`Evento_idEventos` ASC) ,
  CONSTRAINT `fk_Endereco_Evento1`
    FOREIGN KEY (`Evento_idEventos`)
    REFERENCES `offroad2`.`Evento` (`idEventos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `offroad2`.`Participante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroad2`.`Participante` (
  `idUsuario` INT(11) NOT NULL,
  `parNome` VARCHAR(45) NULL,
  `parCpf` INT(11) NULL,
  `parTipoUser` VARCHAR(45) NULL,
  `parNumCel` VARCHAR(45) NULL,
  `usuEmail` VARCHAR(45) NULL,
  `parTamCamisa` VARCHAR(45) NULL,
  `usuSenha` VARCHAR(45) NULL,
  `Evento_idEventos` INT(11) NOT NULL,
  PRIMARY KEY (`idUsuario`, `Evento_idEventos`),
  UNIQUE INDEX `idUsuario_UNIQUE` (`idUsuario` ASC) ,
  INDEX `fk_Participante_Evento1_idx` (`Evento_idEventos` ASC) ,
  CONSTRAINT `fk_Participante_Evento1`
    FOREIGN KEY (`Evento_idEventos`)
    REFERENCES `offroad2`.`Evento` (`idEventos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `offroad2`.`Acessorios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroad2`.`Acessorios` (
  `idAcessorios` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `aceCamisa` VARCHAR(45) NULL,
  `aceAdesivo` VARCHAR(45) NULL,
  `aceBebida` VARCHAR(45) NULL,
  `Evento_idEventos` INT(11) NOT NULL,
  PRIMARY KEY (`idAcessorios`, `Evento_idEventos`),
  INDEX `fk_Acessorios_Evento1_idx` (`Evento_idEventos` ASC) ,
  CONSTRAINT `fk_Acessorios_Evento1`
    FOREIGN KEY (`Evento_idEventos`)
    REFERENCES `offroad2`.`Evento` (`idEventos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `offroad2`.`Pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroad2`.`Pagamento` (
  `idPagamento` INT(11) ZEROFILL NOT NULL AUTO_INCREMENT,
  `pagTipo` VARCHAR(45) NULL,
  `pagValor` FLOAT NULL,
  `pagData` DATE NULL,
  `Evento_idEventos` INT(11) NOT NULL,
  `pagStatus` VARCHAR(45) NULL,
  `pagQrCode` VARCHAR(45) NULL,
  PRIMARY KEY (`idPagamento`, `Evento_idEventos`),
  UNIQUE INDEX `idPagamento_UNIQUE` (`idPagamento` ASC) ,
  INDEX `fk_Pagamento_Evento1_idx` (`Evento_idEventos` ASC) ,
  CONSTRAINT `fk_Pagamento_Evento1`
    FOREIGN KEY (`Evento_idEventos`)
    REFERENCES `offroad2`.`Evento` (`idEventos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `offroad2`.`EnderecoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroad2`.`EnderecoUsuario` (
  `idEndereco` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `useRua` VARCHAR(45) NULL,
  `useBairro` VARCHAR(45) NULL,
  `useLatitude` DOUBLE(10,6) NULL,
  `useLongitude` DOUBLE(10,6) NULL,
  `promoter_idUsuario` INT(11) NOT NULL,
  PRIMARY KEY (`idEndereco`, `promoter_idUsuario`),
  UNIQUE INDEX `idEndereco_UNIQUE` (`idEndereco` ASC) ,
  INDEX `fk_EnderecoUsuario_promoter1_idx` (`promoter_idUsuario` ASC) ,
  CONSTRAINT `fk_EnderecoUsuario_promoter1`
    FOREIGN KEY (`promoter_idUsuario`)
    REFERENCES `offroad2`.`promoter` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `offroad2`.`Evento_img`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroad2`.`Evento_img` (
  `idEvento_img` INT(11) NOT NULL,
  `eveImgNome` VARCHAR(255) NULL,
  `eveImgTipo` VARCHAR(255) NULL,
  `Evento_idEventos` INT(11) NOT NULL,
  `eveImgPrin` VARCHAR(255) NULL,
  PRIMARY KEY (`idEvento_img`, `Evento_idEventos`),
  INDEX `fk_Evento_img_Evento1_idx` (`Evento_idEventos` ASC) ,
  CONSTRAINT `fk_Evento_img_Evento1`
    FOREIGN KEY (`Evento_idEventos`)
    REFERENCES `offroad2`.`Evento` (`idEventos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `offroad2`.`Refeicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `offroad2`.`Refeicao` (
  `idRefeicao` INT(11) NOT NULL AUTO_INCREMENT,
  `refUser` FLOAT NULL,
  `refEvento` FLOAT NULL,
  `refDesc` VARCHAR(255) NULL,
  `Evento_idEventos` INT(11) NOT NULL,
  PRIMARY KEY (`idRefeicao`, `Evento_idEventos`),
  UNIQUE INDEX `idRefeicao_UNIQUE` (`idRefeicao` ASC) ,
  INDEX `fk_Refeicao_Evento1_idx` (`Evento_idEventos` ASC) ,
  CONSTRAINT `fk_Refeicao_Evento1`
    FOREIGN KEY (`Evento_idEventos`)
    REFERENCES `offroad2`.`Evento` (`idEventos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


