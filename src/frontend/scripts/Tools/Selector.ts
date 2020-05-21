import { C } from '@entities/C';

/**
 * The selector of root.
 *
 * @type string
 */
const root = '[id="slide-panels"]';

/**
 * The selector of specifying on this plugin.
 *
 * @type string
 */
const specify = '[data-plugin="slide-panels"]';

/**
 * The tool to selecting DOM elements of this plugin.
 */
export default class Selector {
    /**
     * Returns the list of levers.
     *
     * @type NodeListOf<Element>
     */
    public static levers(): NodeListOf<Element> {
        const attribute = '[data-element="lever"]';

        return document.querySelectorAll(`${root} ${attribute}, ${specify}${attribute}`);
    }

    /**
     * Returns the root.
     *
     * @type Element
     */
    public static root(): Element {
        return document.querySelector(root);
    }

    /**
     * Returns the backstage.
     *
     * @type Element
     */
    public static backstage(): Element {
        const attribute = '[data-element="backstage"]';

        return document.querySelector(`${root} ${attribute}`);
    }

    /**
     * Returns the side.
     *
     * @param side { C.side }
     *   A selected side.
     *
     * @type Element
     */
    public static side(side: C.side): Element {
        const attribute = `[data-element="side"][data-side="${side}"]`;

        return document.querySelector(`${root} ${attribute}`);
    }

    /**
     * ...
     *
     * @param side { C.side }
     *   A selected side.
     *
     * @type Element
     */
    public static sideButtonClose(side: C.side): Element {
        const attribute = `[data-element="side"][data-side="${side}"] > [data-element="lever"][data-action="hide"]:first-child`;

        return document.querySelector(`${root} ${attribute}`);
    }

    /**
     * Returns the list of panels.
     *
     * @type NodeListOf<Element>
     */
    public static panels(): NodeListOf<Element> {
        const attribute = '[data-element="panel"]';

        return document.querySelectorAll(`${root} ${attribute}`);
    }

    /**
     * Returns the panel selected by key.
     *
     * @param panelKey { string }
     *   A panel key.
     *
     * @type Element
     */
    public static panel(panelKey: string): Element {
        const attribute = `[data-element="panel"][data-key="${panelKey}"]`;

        return document.querySelector(`${root} ${attribute}`);
    }

    /**
     * Returns the list of layers of selected panel.
     *
     * @param panelKey { string }
     *   A panel key.
     *
     * @type NodeListOf<Element>
     */
    public static layers(panelKey: string): NodeListOf<Element> {
        const attribute = `[data-element="panel"][data-key="${panelKey}"] [data-element="layer"]`;

        return document.querySelectorAll(`${root} ${attribute}`);
    }

    /**
     * Returns the layer by key of selected panel.
     *
     * @param panelKey { string }
     *   A panel key.
     * @param layerKey { string }
     *   A layer key.
     *
     * @type Element
     */
    public static layer(panelKey: string, layerKey: string): Element {
        const attribute = `[data-element="panel"][data-key="${panelKey}"] [data-element="layer"][data-key="${layerKey}"]`;

        return document.querySelector(`${root} ${attribute}`);
    }
}
