import { C } from '@entities/C';

/**
 * ...
 *
 * @type string
 */
const root = '[id="slide-panels"]';

/**
 * ...
 *
 * @type string
 */
const specify = '[data-plugin="slide-panels"]';

/**
 * ...
 */
class Selector {
    /**
     * ...
     *
     * @type NodeListOf<Element>
     */
    public static levers(): NodeListOf<Element> {
        const attribute = '[data-element="lever"]';

        return document.querySelectorAll(`${root} ${attribute}, ${specify}${attribute}`);
    }

    /**
     * ...
     *
     * @type Element
     */
    public static root(): Element {
        return document.querySelector(root);
    }

    /**
     * ...
     *
     * @type Element
     */
    public static backstage(): Element {
        const attribute = '[data-element="backstage"]';

        return document.querySelector(`${root} ${attribute}`);
    }

    /**
     * ...
     *
     * @param side { C.side }
     *   ...
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
     * @type NodeListOf<Element>
     */
    public static panels(): NodeListOf<Element> {
        const attribute = '[data-element="panel"]';

        return document.querySelectorAll(`${root} ${attribute}`);
    }

    /**
     * ...
     *
     * @param panelKey { string }
     *   ...
     *
     * @type Element
     */
    public static panel(panelKey: string): Element {
        const attribute = `[data-element="panel"][data-key="${panelKey}"]`;

        return document.querySelector(`${root} ${attribute}`);
    }

    /**
     * ...
     *
     * @param panelKey { string }
     *   ...
     *
     * @type NodeListOf<Element>
     */
    public static layers(panelKey: string): NodeListOf<Element> {
        const attribute = `[data-element="panel"][data-key="${panelKey}"] [data-element="layer"]`;

        return document.querySelectorAll(`${root} ${attribute}`);
    }

    /**
     * ...
     *
     * @param panelKey { string }
     *   ...
     * @param layerKey { string }
     *   ...
     *
     * @type Element
     */
    public static layer(panelKey: string, layerKey: string): Element {
        const attribute = `[data-element="panel"][data-key="${panelKey}"] [data-element="layer"][data-key="${layerKey}"]`;

        return document.querySelector(`${root} ${attribute}`);
    }
}

export default Selector;
