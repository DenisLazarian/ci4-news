-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2023 a las 01:06:55
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `news-mini-cms`
--
CREATE DATABASE news-mini-cms IF NOT EXIST;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-01-27-231034', 'App\\Database\\Migrations\\NewsMigration', 'default', 'App', 1674862974, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wallpaper`
--

CREATE TABLE `wallpaper` (
  `id` int(5) UNSIGNED NOT NULL,
  `titol` varchar(55) NOT NULL,
  `text` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `data_publicacio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `wallpaper`
--

INSERT INTO `wallpaper` (`id`, `titol`, `text`, `url`, `data_publicacio`) VALUES
(179, 'El Tejon de mar', 'El tejon de mar es El anima mas majestuaso en la fauna marina. Ademas vive tanto en agua dulce como en tierra firma.', 'El_Tejon_de_mar', '2023-02-10 16:43:00'),
(191, 'Publicacion posterior', 'Esto es una publicacion posterior, ppppp', 'Publicacion_posterior', '2023-02-24 00:00:00'),
(193, 'Articulo grande', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis molestiae nostrum possimus aliquam asperiores harum at! Delectus, nam quasi alias vel neque voluptate velit deserunt quaerat maiores excepturi, a reiciendis.\r\nBeatae, libero id minima reiciendis saepe sequi voluptate nihil, mollitia dolor, itaque omnis recusandae. Doloribus eaque expedita, ad nisi doloremque id animi ea hic culpa quis numquam corporis sapiente veniam.\r\nAccusantium perferendis, eum magnam voluptates incidunt tempore, fugiat esse optio nesciunt eligendi explicabo voluptas aliquid inventore qui sed nostrum illo sit commodi. Sint amet aliquam officiis illo molestiae, non rem!\r\nLabore vero sunt molestiae fugit, quibusdam vel facere similique modi? Voluptate dolor possimus molestias eaque iusto ipsum, sint adipisci ratione, aperiam ut est officiis dolore pariatur asperiores enim deleniti similique.\r\nAnimi aliquam maxime alias atque sunt aperiam inventore, facere necessitatibus nesciunt cum mollitia omnis recusandae ullam! Reprehenderit aliquam voluptatibus neque nobis nam officiis aspernatur? Laudantium veniam qui similique mollitia distinctio?\r\nMinus nostrum, modi asperiores tenetur aliquid reprehenderit accusamus corporis ea ipsum sunt corrupti. Aliquam expedita, ex, voluptatibus ipsum sapiente itaque vel quas neque repellat vero perferendis quidem aspernatur praesentium et!\r\nConsectetur magnam non culpa labore consequuntur nisi nostrum debitis rem magni quam harum deleniti ea delectus suscipit, repudiandae adipisci voluptatem officiis nemo maiores facere at optio eveniet? Quasi, nihil harum?\r\nMollitia cum qui ut hic esse error et velit assumenda temporibus ducimus asperiores aspernatur tenetur, dolorem provident aut! Eum odio id reiciendis accusantium enim vitae sapiente aliquid maxime soluta itaque.\r\nQuibusdam minima non at accusamus, quidem et inventore quam ut consequatur aut culpa eos dolorum, voluptatum est fugit quisquam voluptate excepturi? Accusantium incidunt, sapiente repudiandae itaque quae sed similique quia.\r\nAspernatur fugiat assumenda explicabo officia enim placeat, incidunt rerum, non quod distinctio, provident ab molestias minus. Sed itaque quis illum natus tempore sequi ab dolore, quasi, corrupti repudiandae, dicta vitae?\r\nNon dolorem dolore adipisci maiores aspernatur cupiditate nostrum possimus vitae eligendi fugiat ipsam veritatis, vero placeat ad quia? Nesciunt fugiat tempore officia eius totam illum odio, quidem ea voluptatum alias!\r\nQuos fugiat quia veniam, nam commodi provident est nemo! Repellendus ex culpa quae cum? Aperiam nesciunt, quis assumenda voluptatem odit itaque velit quidem soluta possimus doloremque incidunt maxime sequi. Illum.\r\nBeatae, assumenda. Nesciunt a doloribus ab quaerat perferendis et ratione assumenda beatae praesentium nobis earum, neque eius quis provident! Temporibus quia sed nobis, dolore exercitationem quis! Unde nobis assumenda omnis!\r\nLaboriosam qui nesciunt natus consequuntur, praesentium enim ex magnam autem necessitatibus sed repudiandae tempora consequatur quo ullam, quos modi quibusdam eum ad porro commodi animi, dolores ratione. Sequi, veritatis distinctio!\r\nTemporibus incidunt natus, cumque perspiciatis exercitationem recusandae. Suscipit non quaerat soluta deleniti modi. Fugit perferendis dolorem veritatis voluptate ea necessitatibus maiores, cum nihil animi ipsa delectus. Natus, doloribus ut. Earum.\r\nVero doloremque nobis tempore eaque impedit esse, odio voluptatum. Quo vel veniam accusamus alias doloribus consectetur voluptatibus! Aspernatur id libero tempore blanditiis omnis nisi, tempora perferendis quidem ut! Porro, quibusdam.\r\nDicta quis libero enim maxime fuga similique maiores aliquam praesentium, animi blanditiis adipisci facere nam et explicabo molestiae. Animi ex earum laboriosam quibusdam rerum eos fugit perspiciatis totam mollitia tenetur.\r\nFacere rem ratione quia eum ipsam necessitatibus omnis doloribus corporis incidunt ullam. Consectetur eum excepturi quisquam blanditiis eius tempore mollitia, deleniti, nesciunt aliquam quod neque hic cupiditate provident nostrum vero?\r\nQuia dolor sed non assumenda ducimus, perferendis, dolorem unde sequi culpa optio corporis est laudantium excepturi hic id distinctio beatae ipsa nostrum rem, veritatis quibusdam. Iste nihil numquam labore quod!\r\nDolores, quaerat? Nobis, rem et. Dicta rerum tempore ea perspiciatis assumenda impedit voluptate minus nihil repellat quibusdam, eius quas, similique cumque, at debitis quos provident cum tenetur numquam. Libero, quas!', 'Articulo_grande', '0000-00-00 00:00:00'),
(200, 'Advanced system-worthy task-force', 'Provident quod quisquam ad quia ut consequatur. Cum repellat optio quo recusandae adipisci expedita. Id aut sed officia et qui. Debitis ducimus repellendus quia cumque sed porro veniam.', 'Advanced%system-worthy%task-force', '2003-07-05 18:07:51'),
(201, 'Self-enabling background definition', 'Soluta dolor nesciunt quia a et illo. Fugiat enim velit aut accusamus. Et consequatur et quam eum est sapiente. Dignissimos ipsa sunt itaque numquam voluptas.', 'Self-enabling%background%definition', '2020-04-15 00:04:36'),
(202, 'Synchronised upward-trending encoding', 'Exercitationem aut quod assumenda. Ut quisquam labore et aut. Hic dignissimos ratione dolor vel iusto pariatur ut. Aut velit excepturi et saepe.', 'Synchronised%upward-trending%encoding', '2013-09-25 22:09:13'),
(203, 'User-centric executive moratorium', 'Ipsa est qui eveniet consequatur. Rerum ut sit similique sapiente.', 'User-centric%executive%moratorium', '2003-01-20 22:01:14'),
(204, 'Horizontal maximized portal', 'Autem est voluptatem laudantium quod. Omnis atque libero sunt eum eaque dolores modi. Nemo cum quis pariatur omnis minus.', 'Horizontal%maximized%portal', '1983-07-30 11:07:22'),
(205, 'Progressive bifurcated systemengine', 'Minus autem nihil non. Ut minima a maxime. Et officiis non mollitia aut. Officiis quia eaque incidunt nulla deserunt qui.', 'Progressive%bifurcated%systemengine', '1988-06-13 06:06:57'),
(206, 'Exclusive bottom-line website', 'Nam voluptatem qui quia beatae cum eaque dolor. Quia repudiandae qui ducimus quae. Quod impedit aliquid sapiente natus aut qui. Non eos sed repellat facere sint numquam ducimus.', 'Exclusive%bottom-line%website', '1992-06-09 21:06:08'),
(207, 'Automated national adapter', 'Et temporibus praesentium quo velit perspiciatis. Quis minima laborum mollitia itaque soluta non nisi architecto. Ipsam excepturi est enim voluptas delectus voluptatem.', 'Automated%national%adapter', '1988-03-03 04:03:02'),
(208, 'Distributed high-level productivity', 'Quis aut tenetur laboriosam molestiae. Minus id saepe laborum ut atque neque. Et non corporis quisquam rerum ipsum voluptatum.', 'Distributed%high-level%productivity', '1987-08-18 08:08:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wallpaper`
--
ALTER TABLE `wallpaper`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titol` (`titol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `wallpaper`
--
ALTER TABLE `wallpaper`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
